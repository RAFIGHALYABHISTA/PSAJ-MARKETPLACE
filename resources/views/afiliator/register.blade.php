@extends('layouts.customer')

@section('title', 'Daftar Sebagai Affiliator - Sariayu Smega')

@section('content')
<div class="min-h-screen bg-[#F9F1E7] dark:bg-stone-950 py-16 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-[#738029]/10 text-[#738029] rounded-full text-xs font-black uppercase tracking-[0.2em] mb-4">
                Exclusive Opportunity
            </span>
            <h1 class="text-5xl font-serif text-[#2D1B0E] dark:text-white mb-6">
                Jadi Bagian dari <br><span class="italic text-[#738029]">Sariayu Smega</span>
            </h1>
            <p class="text-stone-600 dark:text-stone-400 max-w-xl mx-auto leading-relaxed">
                Wujudkan jiwa entrepreneurship Anda dan raih komisi eksklusif dengan merekomendasikan produk kecantikan legendaris Indonesia.
            </p>
            
            <div class="grid grid-cols-3 gap-4 mt-10 py-8 border-y border-stone-200 dark:border-stone-800">
                <div class="text-center">
                    <p class="text-2xl md:text-3xl font-serif text-[#738029]">20%</p>
                    <p class="text-[10px] uppercase tracking-widest text-stone-500 mt-1 font-bold">Komisi Tetap</p>
                </div>
                <div class="text-center border-x border-stone-200 dark:border-stone-800">
                    <p class="text-2xl md:text-3xl font-serif text-[#738029]">∞</p>
                    <p class="text-[10px] uppercase tracking-widest text-stone-500 mt-1 font-bold">Tanpa Batas</p>
                </div>
                <div class="text-center">
                    <p class="text-2xl md:text-3xl font-serif text-[#738029]">Direct</p>
                    <p class="text-[10px] uppercase tracking-widest text-stone-500 mt-1 font-bold">Pencairan Mudah</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-stone-900 rounded-[2rem] shadow-2xl shadow-stone-200/50 dark:shadow-none border border-stone-100 dark:border-stone-800 overflow-hidden">
            <div class="bg-[#2D1B0E] px-10 py-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-[#738029]/20 rounded-full -mr-16 -mt-16 blur-2xl"></div>
                <h2 class="text-2xl font-serif relative z-10">Formulir Kemitraan</h2>
                <p class="text-stone-400 text-sm mt-1 relative z-10 font-light">Lengkapi data untuk aktivasi dashboard afiliasi Anda.</p>
            </div>

            <form action="{{ route('afiliator.store') }}" method="POST" class="p-10 space-y-8">
                @csrf

                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <span class="w-8 h-8 rounded-full bg-stone-100 dark:bg-stone-800 flex items-center justify-center text-[#2D1B0E] dark:text-stone-300 text-xs font-bold">01</span>
                        <h3 class="text-sm font-black uppercase tracking-widest text-stone-800 dark:text-white">Informasi Personal</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">Nama Afiliator</label>
                            <input type="text" value="{{ auth()->user()->name }}" disabled 
                                   class="w-full px-5 py-3.5 bg-stone-50 dark:bg-stone-800 border border-stone-200 dark:border-stone-700 rounded-xl text-stone-500 font-medium">
                        </div>

                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">WhatsApp / No. HP <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" placeholder="08..." value="{{ old('phone') }}" required
                                   class="w-full px-5 py-3.5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl focus:ring-2 ring-[#738029]/20 focus:border-[#738029] outline-none transition-all @error('phone') border-red-500 @enderror">
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">Alamat Domisili Lengkap <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="2" required placeholder="Sebutkan jalan, nomor, dan kecamatan..."
                                      class="w-full px-5 py-3.5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl focus:ring-2 ring-[#738029]/20 focus:border-[#738029] outline-none transition-all @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-stone-100 dark:border-stone-800">
                    <div class="flex items-center space-x-3 mb-6">
                        <span class="w-8 h-8 rounded-full bg-stone-100 dark:bg-stone-800 flex items-center justify-center text-[#2D1B0E] dark:text-stone-300 text-xs font-bold">02</span>
                        <h3 class="text-sm font-black uppercase tracking-widest text-stone-800 dark:text-white">Tujuan Pencairan Komisi</h3>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">Nama Bank / Dompet Digital <span class="text-red-500">*</span></label>
                            <input type="text" name="bank_name" placeholder="BCA / Mandiri / GoPay" value="{{ old('bank_name') }}" required
                                   class="w-full px-5 py-3.5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl outline-none @error('bank_name') border-red-500 @enderror">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">Nomor Rekening / No HP <span class="text-red-500">*</span></label>
                            <input type="text" name="bank_account_number" placeholder="Nomor akun..." value="{{ old('bank_account_number') }}" required
                                   class="w-full px-5 py-3.5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl outline-none @error('bank_account_number') border-red-500 @enderror">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[11px] font-bold text-stone-500 uppercase tracking-tight ml-1">Nama Pemilik Rekening <span class="text-red-500">*</span></label>
                            <input type="text" name="bank_account_name" placeholder="Nama sesuai rekening..." value="{{ old('bank_account_name') }}" required
                                   class="w-full px-5 py-3.5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-700 rounded-xl outline-none @error('bank_account_name') border-red-500 @enderror">
                        </div>
                    </div>
                </div>

                <div class="pt-8 border-t border-stone-100 dark:border-stone-800 space-y-4">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" name="agree_terms" value="true" required class="mt-1 peer hidden">
                        <div class="flex items-center justify-center w-5 h-5 rounded border-2 border-stone-300 bg-white peer-checked:bg-[#738029] peer-checked:border-[#738029] transition-all">
                            <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-xs text-stone-600 dark:text-stone-400 leading-relaxed">
                            Saya menyetujui Kode Etik dan Syarat & Ketentuan sebagai Afiliator Sariayu Smega <span class="text-red-500">*</span>
                        </span>
                    </label>
                </div>

                <div class="pt-10 flex flex-col md:flex-row gap-4">
                    <a href="{{ route('home') }}" class="flex-1 px-8 py-4 border-2 border-stone-200 dark:border-stone-800 text-stone-600 dark:text-stone-400 rounded-2xl font-bold text-sm text-center hover:bg-stone-50 transition-all uppercase tracking-widest">
                        Batal
                    </a>
                    <button type="submit" class="flex-[2] px-8 py-4 bg-[#738029] hover:bg-[#5B2C04] text-white rounded-2xl font-black text-sm transition-all shadow-xl shadow-[#738029]/20 active:scale-[0.98] uppercase tracking-[0.2em]">
                        Konfirmasi Kemitraan
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-24 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white/60 dark:bg-stone-900/40 backdrop-blur-sm p-8 rounded-3xl border border-white dark:border-stone-800">
                <div class="w-12 h-12 bg-[#738029] text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-[#738029]/30">
                    <i class="fas fa-magic"></i>
                </div>
                <h4 class="text-lg font-serif text-[#2D1B0E] dark:text-white mb-2">Akses Produk Eksklusif</h4>
                <p class="text-sm text-stone-500 leading-relaxed">Jadilah yang pertama mencoba dan mempromosikan produk terbaru dari Sariayu Martha Tilaar.</p>
            </div>

            <div class="bg-white/60 dark:bg-stone-900/40 backdrop-blur-sm p-8 rounded-3xl border border-white dark:border-stone-800">
                <div class="w-12 h-12 bg-yellow-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-yellow-600/30">
                    <i class="fas fa-university"></i>
                </div>
                <h4 class="text-lg font-serif text-[#2D1B0E] dark:text-white mb-2">Pelatihan Bisnis</h4>
                <p class="text-sm text-stone-500 leading-relaxed">Dapatkan sesi mentoring khusus tentang strategi digital marketing dan branding.</p>
            </div>
        </div>
    </div>
</div>
@endsection