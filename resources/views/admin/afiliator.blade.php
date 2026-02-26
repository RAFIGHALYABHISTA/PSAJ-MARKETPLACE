@extends('layouts.header')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Data Afiliator</h1>
            <p class="text-xs text-gray-500">Kelola daftar afiliator Sariayu x Smega.</p>
        </div>
        <a href="{{ route('admin.afiliator.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 shadow-sm transition">
            <i class="fas fa-plus mr-2"></i> Tambah Afiliator
        </a>
    </header>

    <div class="p-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="font-bold text-gray-800">Daftar Afiliator (Total: {{ $users->total() }})</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50/50 text-gray-500 text-[11px] uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4 font-bold">Nama</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold">Pesanan</th>
                            <th class="px-6 py-4 font-bold">Komisi</th>
                            <th class="px-6 py-4 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm">{{ $user->affiliatedOrders->count() }}</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded">Rp {{ number_format($user->commissions->sum('amount'), 0, ',', '.') }}</span></td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex gap-2 justify-end">
                                    <a href="{{ route('admin.afiliator.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-semibold">Edit</a>
                                    <form action="{{ route('admin.afiliator.destroy', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 hover:text-red-900 text-sm font-semibold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada afiliator</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
            <div class="p-6 bg-gray-50/30 flex justify-between items-center border-t border-gray-100">
                <p class="text-xs text-gray-500">Menampilkan <b>{{ $users->firstItem() ?? 0 }} - {{ $users->lastItem() ?? 0 }}</b> dari <b>{{ $users->total() }}</b> Data</p>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
