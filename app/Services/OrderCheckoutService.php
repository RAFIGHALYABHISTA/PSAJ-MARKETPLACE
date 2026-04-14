<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Commission;
use App\Models\Affiliator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderCheckoutService
{
    public function processCheckout(Order $order, Request $request): Order
    {
        $request->validate([
            'payment_method'  => 'required|in:online,offline',
            'payment_proof'   => 'required_if:payment_method,online|nullable|image|max:2048',
            'referral_code'   => 'nullable|string',
        ]);

        $result = $this->processReferral($order, $request->referral_code);
        $proofPath = $this->uploadPaymentProof($request);
        
        $order->update([
            'payment_method'      => $request->payment_method,
            'payment_proof'       => $proofPath,
            'affiliator_id'       => $result['affiliator_id'],
            'referral_code'       => $request->referral_code,
            'commission_amount'   => $result['commission_amount'],
            'invoice_number'      => $this->generateInvoiceNumber(),
        ]);

        Payment::create([
            'order_id'    => $order->id,
            'proof_image' => $proofPath,
            'status'      => 'pending',
            'paid_at'     => null,
        ]);

        if ($result['affiliator_id'] && $result['commission_amount'] > 0) {
            Commission::create([
                'order_id'      => $order->id,
                'affiliator_id' => $result['affiliator_id'],
                'amount'        => $result['commission_amount'],
                'status'        => 'pending',
            ]);
        }

        return $order->fresh();
    }

    private function processReferral(Order $order, ?string $code): array
    {
        $affiliatorId = null;
        $commissionAmount = 0;

        if ($code) {
            $affiliator = Affiliator::where('referral_code', $code)
                ->where('status', 'aktif')
                ->first();

            if ($affiliator) {
                $affiliatorId = $affiliator->user_id;
                $commissionAmount = $order->total_price * 0.20;
            }
        }

        return ['affiliator_id' => $affiliatorId, 'commission_amount' => $commissionAmount];
    }

    private function uploadPaymentProof(Request $request): ?string
    {
        if (!$request->hasFile('payment_proof')) {
            return null;
        }
        return $request->file('payment_proof')->store('payment_proofs', 'public');
    }

    private function generateInvoiceNumber(): string
    {
        return 'INV-' . strtoupper(Str::random(8)) . '-' . now()->format('Ymd');
    }
}