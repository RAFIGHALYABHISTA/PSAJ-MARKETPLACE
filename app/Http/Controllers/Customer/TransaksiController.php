<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\OrderCheckoutService;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

    public function index()
    {
        return redirect()->route('customer.produk');
    }

    public function show(Product $product)
    {
        $product->load('category');

        // Rekomendasi: produk kategori sama, exclude produk ini
        $rekomendasi = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', 'TRUE')
            ->limit(4)
            ->get();

        return view('customer.transaksi', compact('product', 'rekomendasi'));
    }

    public function buyNow(Request $request, Product $product)
    {
        $request->validate([
            'quantity'       => 'required|integer|min:1',
            'payment_method' => 'required|in:online,offline',
            'payment_proof'  => 'required_if:payment_method,online|nullable|image|max:2048',
            'referral_code'  => 'nullable|string',
        ]);

        $qty = $request->quantity;

        // Buat draft + item
        $order = $this->createDraftOrderWithProduct($product, $qty);

        // Checkout pakai service
        $checkoutService = app(OrderCheckoutService::class);
        $order = $checkoutService->processCheckout($order, $request);

        return redirect()->route('customer.checkout.success', $order->id);
    }

    // TAMBAH method helper ini:
    private function createDraftOrderWithProduct(Product $product, int $qty)
    {
        $order = Order::firstOrCreate(
            ['customer_id' => auth()->id(), 'payment_status' => 'pending'],
            [
                'total_product_price' => 0,
                'commission_amount'   => 0,
                'total_price'         => 0,
                'payment_method'      => 'offline',
                'invoice_number'      => 'DRAFT-' . auth()->id() . '-' . time(),
            ]
        );

        $item = OrderItem::where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += $qty;
            $item->subtotal = $item->quantity * $item->price;
            $item->save();
        } else {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'quantity'   => $qty,
                'price'      => $product->price,
                'subtotal'   => $product->price * $qty,
            ]);
        }

        $order->total_product_price = $order->orderItems->sum('subtotal');
        $order->total_price = $order->total_product_price;
        $order->save();

        return $order;
    }
}
