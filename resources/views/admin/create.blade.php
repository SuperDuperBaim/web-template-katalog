@extends('layouts.app')

@section('title', 'Tambah Template Baru')

@section('content')

<div class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="glass-card w-full max-w-2xl rounded-2xl p-8 relative overflow-hidden">
        
        {{-- Decorative Background Blur --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl -z-10 transform translate-x-1/2 -translate-y-1/2"></div>
        
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-white mb-2">Tambah Template Baru</h2>
            <p class="text-gray-400 text-sm">Masukan detail template portfolio yang ingin ditampilkan.</p>
        </div>
        
        <form action="{{ route('admin.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-2">Nama Template</label>
                    <input type="text" name="nama_template" class="w-full px-4 py-3 rounded-xl input-dark" placeholder="Contoh: Portfolio Modern" required>
                </div>
                
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-2">Kategori</label>
                    <div class="relative">
                        <select name="kategori" class="w-full px-4 py-3 rounded-xl input-dark appearance-none">
                            <option value="Minimalist">Minimalist</option>
                            <option value="Creative">Creative</option>
                            <option value="Professional">Professional</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-2">URL Foto Preview</label>
                <input type="url" name="foto_preview" class="w-full px-4 py-3 rounded-xl input-dark" placeholder="https://..." required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-2">Link Demo</label>
                    <input type="url" name="link_demo" class="w-full px-4 py-3 rounded-xl input-dark" placeholder="https://demo.com" required>
                </div>
                
                <div>
                    <label class="block text-gray-400 text-sm font-medium mb-2">Link GitHub</label>
                    <input type="url" name="link_github" class="w-full px-4 py-3 rounded-xl input-dark" placeholder="https://github.com/..." required>
                </div>
            </div>

            <div>
                <label class="block text-gray-400 text-sm font-medium mb-2">Deskripsi Singkat</label>
                <textarea name="deskripsi" class="w-full px-4 py-3 rounded-xl input-dark" rows="4" placeholder="Jelaskan fitur utama template ini..." required></textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full btn-primary py-3.5 rounded-xl font-bold shadow-lg shadow-emerald-500/20">
                    Simpan Template
                </button>
            </div>
            
            <div class="text-center mt-6">
                <a href="/" class="text-gray-500 text-sm hover:text-emerald-400 transition-colors">Batal & Kembali ke Katalog</a>
            </div>
        </form>
    </div>
</div>
@endsection