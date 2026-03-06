@extends('layouts.admin.header')

@section('content')
<div class="min-h-screen transition-colors duration-300 dark:bg-slate-950 bg-[#F8FAFC]">
    
    <header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-800 sticky top-0 z-30 p-4 px-8 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white uppercase tracking-tight">Konfigurasi Sistem</h1>
            <p class="text-xs text-slate-400 font-medium italic">Struktur bagi hasil <span class="text-indigo-600">Afiliator & Partner</span></p>
        </div>
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded text-xs font-black tracking-widest transition-all active:scale-95 shadow-sm uppercase">
            <i class="fas fa-save mr-2 text-[10px]"></i> Simpan Perubahan
        </button>
    </header>

    <div class="p-8 max-w-[1200px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            
            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Komisi Per Kategori</h3>
                </div>
                
                <div class="p-6 space-y-5">
                    <div class="group">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 block">Kategori: Siswa</label>
                        <div class="flex items-center">
                            <div class="relative flex-1">
                                <input type="number" 
                                       class="w-full bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded p-3 text-sm font-bold text-slate-700 dark:text-white focus:ring-1 ring-indigo-500 outline-none transition-all" 
                                       value="10" />
                                <span class="absolute right-4 top-3 text-slate-400 font-bold">%</span>
                            </div>
                            <button class="ml-3 p-3 text-slate-400 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-history text-xs"></i>
                            </button>
                        </div>
                        <p class="text-[10px] text-slate-400 mt-2 italic">*Berlaku untuk semua produk kecuali promo.</p>
                    </div>

                    <div class="group">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 block">Kategori: Guru / Staff</label>
                        <div class="flex items-center">
                            <div class="relative flex-1">
                                <input type="number" 
                                       class="w-full bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded p-3 text-sm font-bold text-slate-700 dark:text-white focus:ring-1 ring-indigo-500 outline-none transition-all" 
                                       value="15" />
                                <span class="absolute right-4 top-3 text-slate-400 font-bold">%</span>
                            </div>
                            <button class="ml-3 p-3 text-slate-400 hover:text-indigo-600 transition-colors">
                                <i class="fas fa-history text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 border border-gray-200 dark:border-slate-800 rounded shadow-sm overflow-hidden h-fit">
                <div class="p-5 border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-900/50">
                    <h3 class="font-bold text-slate-800 dark:text-white text-sm uppercase tracking-wider">Insentif Tambahan</h3>
                </div>
                
                <div class="p-6 space-y-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 block">Bonus Referral (Flat)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-slate-400 font-bold text-xs font-mono">Rp</span>
                            <input type="number" 
                                   class="w-full bg-slate-50 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded p-3 pl-12 text-sm font-bold text-slate-700 dark:text-white focus:ring-1 ring-indigo-500 outline-none transition-all" 
                                   value="5000" />
                        </div>
                        <div class="mt-4 flex items-center justify-between p-3 bg-indigo-50 dark:bg-indigo-500/5 rounded border border-indigo-100 dark:border-indigo-500/20">
                            <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-tighter">Status Bonus Aktif</span>
                            <div class="w-8 h-4 bg-indigo-600 rounded-full relative cursor-pointer">
                                <div class="absolute right-1 top-1 w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-amber-50 dark:bg-amber-900/10 border border-amber-100 dark:border-amber-900/30 p-4 rounded flex items-start">
            <i class="fas fa-info-circle text-amber-500 mt-0.5 mr-3"></i>
            <p class="text-[11px] text-amber-700 dark:text-amber-400 leading-relaxed font-medium">
                <strong>Catatan:</strong> Perubahan persentase komisi akan langsung berdampak pada transaksi baru. Transaksi yang sudah masuk sebelum perubahan tetap mengikuti rate komisi lama untuk menjaga konsistensi data finansial.
            </p>
        </div>
    </div>
</div>
@endsection