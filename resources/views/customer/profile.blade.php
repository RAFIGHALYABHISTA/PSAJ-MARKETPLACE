@extends('layouts.customer')

@section('title', 'Edit Profile')

@section('content')
<div class="min-h-screen bg-slate-50 dark:bg-slate-950 py-12 px-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-slate-800 dark:text-white mb-8">Edit Profile</h1>

        <div class="bg-white dark:bg-slate-900 rounded-lg shadow p-8">
            <form>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nama Lengkap</label>
                        <input type="text" value="{{ auth()->user()->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" disabled>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input type="email" value="{{ auth()->user()->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg" disabled>
                    </div>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
