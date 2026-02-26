<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    /**
     * Display commissions (pencairan komisi).
     */
    public function index()
    {
        $commissions = Commission::with(['order', 'affiliator'])
            ->latest()
            ->paginate(15);

        $stats = [
            'pending' => Commission::where('status', 'pending')->count(),
            'approved' => Commission::where('status', 'approved')->count(),
            'paid' => Commission::where('status', 'paid')->count(),
        ];

        $totalPending = Commission::where('status', 'pending')->sum('amount');
        $totalApproved = Commission::where('status', 'approved')->sum('amount');
        $totalPaid = Commission::where('status', 'paid')->sum('amount');

        return view('admin.pencairan', [
            'commissions' => $commissions,
            'stats' => $stats,
            'totalPending' => $totalPending,
            'totalApproved' => $totalApproved,
            'totalPaid' => $totalPaid,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Commission $commission)
    {
        $commission->load(['order', 'affiliator']);
        return view('admin.commission-detail', ['commission' => $commission]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commission $commission)
    {
        return view('admin.commission-form', ['commission' => $commission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commission $commission)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,paid',
        ]);

        $commission->update($validated);

        return redirect()->route('admin.pencairan')
            ->with('success', 'Status komisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commission $commission)
    {
        $commission->delete();
        return back()->with('success', 'Komisi berhasil dihapus');
    }
}
