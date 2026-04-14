<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Services\OrderCheckoutService;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = OrderItem::with('product.category')
            ->whereHas('order', function ($q) {
                $q->where('customer_id', auth()->id())
                    ->where('payment_status', 'pending');
            })
            ->get();

        $subtotal = $keranjang->sum('subtotal');

        return view('customer.keranjang', compact('keranjang', 'subtotal'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // Cari draft order (pending) milik user, atau buat baru
        $order = Order::firstOrCreate(
            [
                'customer_id'    => auth()->id(),
                'payment_status' => 'pending',
            ],
            [
                'total_product_price' => 0,
                'commission_amount'   => 0,
                'total_price'         => 0,
                'payment_method'      => 'offline',
                'invoice_number'      => 'DRAFT-' . auth()->id() . '-' . time(),
            ]
        );

        // Cek apakah produk sudah ada di keranjang
        $item = OrderItem::where('order_id', $order->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->subtotal = $item->quantity * $item->price;
            $item->save();
        } else {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $product->id,
                'quantity'   => 1,
                'price'      => $product->price,
                'subtotal'   => $product->price,
            ]);
        }

        // Update total di order
        $order->load('orderItems');
        $order->total_product_price = $order->orderItems->sum('subtotal');
        $order->total_price = $order->total_product_price;
        $order->save();

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function update(Request $request, OrderItem $keranjang)
    {
        $keranjang->quantity = max(1, $request->quantity);
        $keranjang->subtotal = $keranjang->quantity * $keranjang->price;
        $keranjang->save();

        // Update total order
        $order = $keranjang->order;
        $order->load('orderItems');
        $order->total_product_price = $order->orderItems->sum('subtotal');
        $order->total_price = $order->total_product_price;
        $order->save();

        return redirect()->route('customer.keranjang');
    }

    public function destroy(OrderItem $keranjang)
    {
        $order = $keranjang->order;
        $keranjang->delete();

        // Update total order
        $order->load('orderItems');
        $order->total_product_price = $order->orderItems->sum('subtotal');
        $order->total_price  = $order->total_product_price;
        $order->save();

        return redirect()->route('customer.keranjang');
    }

    public function checkout(Request $request)
    {
        $order = Order::where('customer_id', auth()->id())
            ->where('payment_status', 'pending')
            ->where('total_price', '>', 0)
            ->with('orderItems')
            ->latest()
            ->firstOrFail();

        $checkoutService = app(OrderCheckoutService::class);
        $order = $checkoutService->processCheckout($order, $request);

        return redirect()->route('customer.riwayat')
            ->with('success', 'Checkout berhasil!');
    }
}
