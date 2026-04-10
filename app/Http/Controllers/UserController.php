<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the affiliators list.
     */
    public function index()
    {
        $users = User::with(['orders', 'affiliatedOrders', 'commissions'])
            ->paginate(15);

        return view('admin.afiliator', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.afiliator-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:superadmin,affiliator,customer',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.afiliator')
            ->with('success', "✅ Afiliator '{$validated['name']}' berhasil ditambahkan sebagai {$validated['role']}!");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load(['orders', 'affiliatedOrders', 'commissions']);
        return view('admin.afiliator-detail', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.afiliator-form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:superadmin,affiliator,customer',
        ]);

        $oldRole = $user->role;

        // Update name and email via Eloquent
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        // Fix PostgreSQL enum - use parameter binding
        \DB::update('UPDATE users SET role = ? WHERE id = ?', [
            (string) $validated['role'],
            $user->id
        ]);

        $roleMessage = $oldRole !== $validated['role']
            ? " dengan role diubah dari {$oldRole} menjadi {$validated['role']}"
            : '';

        return redirect()->route('admin.afiliator')
            ->with('success', "✏️ Afiliator '{$user->name}' berhasil diperbarui{$roleMessage}!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $name = $user->name;
        $user->delete();

        return redirect()->route('admin.afiliator')
            ->with('success', "🗑️ Afiliator '{$name}' berhasil dihapus!");
    }
}
