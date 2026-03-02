@extends('layouts.admin.header')

@section('content')
<div class="flex-1 bg-gray-50 min-h-screen">
    <header class="bg-white border-b border-gray-200 sticky top-0 z-10 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Pengaturan Komisi</h1>
            <p class="text-xs text-gray-500">Atur struktur dan persentase komisi afiliator.</p>
        </div>
    </header>

    <div class="p-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-gray-800 mb-6">Komisi Per Kategori</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium text-gray-700">Siswa</span>
                        <div class="flex items-center gap-2">
                            <input type="number" class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-right" value="10" />
                            <span class="text-gray-500">%</span>
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium text-gray-700">Guru</span>
                        <div class="flex items-center gap-2">
                            <input type="number" class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-right" value="15" />
                            <span class="text-gray-500">%</span>
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-gray-800 mb-6">Komisi Tambahan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium text-gray-700">Bonus Referral</span>
                        <div class="flex items-center gap-2">
                            <input type="number" class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-right" value="5000" />
                            <span class="text-gray-500">Rp</span>
                            <button class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
            <i class="fas fa-save mr-2"></i> Simpan Perubahan
        </button>
    </div>
</div>
@endsection
