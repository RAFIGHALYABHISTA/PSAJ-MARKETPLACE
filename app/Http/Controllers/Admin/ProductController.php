<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(12);
        return view('admin.produk', ['products' => $products]);
    }

    /**
     * Display product management page with real-time statistics.
     */
    public function manajemen(Request $request)
    {
        $query = Product::with('category');

        // Filter by search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by product status
        if ($request->filled('status')) {
            $isActive = $request->status === 'aktif';
            $query->whereRaw('"is_active" = ?', [$isActive ? 'true' : 'false']);
        }

        // Filter by stock status
        if ($request->filled('stock_status')) {
            switch ($request->stock_status) {
                case 'available':
                    $query->where('stock', '>', 10);
                    break;
                case 'low':
                    $query->whereBetween('stock', [1, 10]);
                    break;
                case 'out':
                    $query->where('stock', 0);
                    break;
            }
        }

        $products = $query->latest()->paginate(10)->withQueryString();

        // Statistics
        $totalProducts = Product::count();
        $activeProducts = Product::whereRaw('"is_active" = ?', ['true'])->count();
        $inactiveProducts = $totalProducts - $activeProducts;
        $totalStock = Product::sum('stock');
        $totalValue = Product::selectRaw('SUM(stock * price) as total')->first()->total ?? 0;
        $lowStockCount = Product::whereBetween('stock', [1, 10])->count();
        $outOfStockCount = Product::where('stock', 0)->count();

        // Get all categories for styling lookup
        $categories = \App\Models\Category::all()->keyBy('id');

        return view('admin.manajemen-produk', compact(
            'products',
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'totalStock',
            'totalValue',
            'lowStockCount',
            'outOfStockCount',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'stock' => 'required|integer|min:0',
                'is_active' => 'boolean',
                'category_id' => 'required|exists:category,id',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $validated['image'] = 'images/products/' . $imageName;
            }

            $product = Product::create($validated);

            return redirect()->route('admin.manajemen-produk')
                ->with('success', "✅ Produk '{$product->name}' berhasil ditambahkan ke katalog!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '❌ Gagal menambahkan produk: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.produk-detail', ['product' => $product]);
    }

    /**
     * Display product catalog with real-time data.
     */
    public function katalog(Request $request)
    {
        $query = Product::with('category');

        // Filter by search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by product status
        if ($request->filled('status')) {
            $isActive = $request->status === 'aktif';
            $query->whereRaw('"is_active" = ?', [$isActive ? 'true' : 'false']);
        }

        // Filter by stock status
        if ($request->filled('stock_status')) {
            switch ($request->stock_status) {
                case 'available':
                    $query->where('stock', '>', 10);
                    break;
                case 'low':
                    $query->whereBetween('stock', [1, 10]);
                    break;
                case 'out':
                    $query->where('stock', 0);
                    break;
            }
        }

        $products = $query->latest()->paginate(12)->withQueryString();

        // Statistics (same as manajemen)
        $totalProducts = Product::count();
        $activeProducts = Product::whereRaw('"is_active" = ?', ['true'])->count();
        $inactiveProducts = $totalProducts - $activeProducts;
        $totalStock = Product::sum('stock');
        $totalValue = Product::selectRaw('SUM(stock * price) as total')->first()->total ?? 0;
        $lowStockCount = Product::whereBetween('stock', [1, 10])->count();
        $outOfStockCount = Product::where('stock', 0)->count();

        // Get all categories for styling lookup
        $categories = \App\Models\Category::all()->keyBy('id');

        return view('admin.katalog-produk', compact(
            'products',
            'totalProducts',
            'activeProducts',
            'inactiveProducts',
            'totalStock',
            'totalValue',
            'lowStockCount',
            'outOfStockCount',
            'categories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load('category');
        return view('admin.produk-form', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Check if this is a stock-only update from the management modal
            if ($request->has('update_stock_only')) {
                $validated = $request->validate([
                    'stock' => 'required|integer|min:0',
                    'stock_note' => 'nullable|string|max:255',
                ]);

                $oldStock = $product->stock;
                $product->update(['stock' => $validated['stock']]);

                return redirect()->route('admin.manajemen-produk')
                    ->with('success', "📦 Stok '{$product->name}' diperbarui dari {$oldStock} menjadi {$validated['stock']} pcs!");
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
                'stock' => 'required|integer|min:0',
                'is_active' => 'boolean',
                'category_id' => 'required|exists:category,id',
            ]);

            // Handle image upload if new file provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && !Str::startsWith($product->image, 'http')) {
                    $oldImagePath = public_path($product->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $validated['image'] = 'images/products/' . $imageName;
            }

            $oldName = $product->name;
            $product->update($validated);

            return redirect()->route('admin.manajemen-produk')
                ->with('success', "✏️ Produk '{$oldName}' berhasil diperbarui!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', '❌ Gagal memperbarui produk: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $name = $product->name;
            $product->delete();

            return redirect()->route('admin.manajemen-produk')
                ->with('success', "🗑️ Produk '{$name}' berhasil dihapus dari katalog!");
        } catch (\Exception $e) {
            return redirect()->route('admin.manajemen-produk')
                ->with('error', '❌ Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
