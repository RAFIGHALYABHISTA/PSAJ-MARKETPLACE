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
        $newRole = $validated['role'];

        // Update user data
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $newRole;
        $user->save();

        // If role changed from affiliator to non-affiliator, delete affiliator data
        $affiliatorDeleted = false;
        if ($oldRole === 'affiliator' && $newRole !== 'affiliator') {
            $deletedCount = \App\Models\Affiliator::where('user_id', $user->id)->delete();
            $affiliatorDeleted = $deletedCount > 0;
        }

        $roleMessage = $oldRole !== $newRole
            ? " dengan role diubah dari {$oldRole} menjadi {$newRole}"
            : '';

        $affiliatorMessage = $affiliatorDeleted ? ' Data affiliator terkait telah dihapus.' : '';

        // If role changed from affiliator, redirect to home instead of affiliator list
        if ($oldRole === 'affiliator' && $newRole !== 'affiliator') {
            return redirect()->route('home')
                ->with('success', "✏️ User '{$user->name}' berhasil diubah ke role {$newRole}.{$affiliatorMessage}");
        }

        return redirect()->route('admin.afiliator')
            ->with('success', "✏️ Afiliator '{$user->name}' berhasil diperbarui{$roleMessage}!{$affiliatorMessage}");
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
