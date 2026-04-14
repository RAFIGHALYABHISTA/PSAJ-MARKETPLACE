<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Affiliator;
use App\Models\Order;

use Illuminate\Http\Request;



class CheckoutController extends Controller
{

    public function checkReferral(Request $request)
    {
        $affiliator = Affiliator::where('referral_code', $request->code)
            ->where('status', 'aktif')
            ->with('user')
            ->first();

        if ($affiliator) {
            return response()->json([
                'valid' => true,
                'name'  => $affiliator->user->name,
            ]);
        }

        return response()->json(['valid' => false]);
    }

    public function success(Order $order)
    {
    
        abort_if($order->customer_id !== auth()->id(), 403);

        return view('customer.riwayat', compact('order'));
    }
}
