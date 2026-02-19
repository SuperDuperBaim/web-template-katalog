@extends('layouts.app')

@section('title', 'Katalog Template Profile - Ananda')

@section('content')

    <nav class="glass-nav sticky top-0 z-50 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-gray-400">
                MyProfile<span class="text-emerald-500">Templates</span>
            </h1>
            <div class="space-x-4 flex items-center">
                <a href="#" class="text-gray-300 hover:text-white transition">Home</a>
                @auth
                    <span class="text-emerald-400 text-sm">Hi, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 transition text-sm ml-2">Logout</button>
                    </form>
                    @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.create') }}" class="btn-primary px-4 py-2 rounded-lg text-sm transition shadow-lg shadow-emerald-500/20">
                        + Tambah Template
                    </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition px-4 py-2 text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary px-5 py-2 rounded-lg transition shadow-lg shadow-emerald-500/20 text-sm">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="container mx-auto px-6 py-20 text-center relative">
        <div class="absolute top-10 left-1/2 -translate-x-1/2 w-64 h-64 bg-emerald-500/20 rounded-full blur-3xl -z-10"></div>
        
        <h2 class="text-5xl md:text-6xl font-extrabold mb-6 tracking-tight">
            Pilih Template <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-teal-500">Portofolio Terbaikmu</span>
        </h2>
        <p class="text-gray-400 max-w-2xl mx-auto text-lg leading-relaxed">
            Koleksi template website profil siap pakai untuk mahasiswa IT dan profesional. Mudah diedit dan sudah dioptimasi untuk performa.
        </p>
    </header>

    <main class="container mx-auto px-6 mb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- Loop Data dari Database --}}
            @forelse($templates as $template)
            <div class="glass-card rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 group">
                <div class="h-52 bg-gray-800 overflow-hidden relative">
                    <img src="{{ $template->foto_preview }}" alt="{{ $template->nama_template }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                    <span class="absolute bottom-4 left-4 text-xs font-semibold text-emerald-300 bg-emerald-900/50 backdrop-blur-md px-3 py-1 rounded-full border border-emerald-500/30">
                        {{ $template->kategori }}
                    </span>
                </div>
                
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500 text-xs">{{ $template->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-emerald-400 transition-colors">{{ $template->nama_template }}</h3>
                    <p class="text-gray-400 text-sm mb-6 line-clamp-2 leading-relaxed">{{ $template->deskripsi }}</p>
                    
                    <div class="flex gap-3">
                        <a href="{{ $template->link_demo }}" target="_blank" class="flex-1 text-center bg-gray-800 hover:bg-gray-700 text-white py-2.5 rounded-xl transition text-sm font-medium border border-gray-700">
                            <i class="fa-solid fa-eye mr-1.5 text-emerald-400"></i> Live Demo
                        </a>
                        @auth
                            <a href="{{ $template->link_github }}" target="_blank" class="flex-1 text-center bg-gray-800 hover:bg-gray-700 text-white py-2.5 rounded-xl transition text-sm font-medium border border-gray-700">
                                <i class="fa-brands fa-github mr-1.5 text-white"></i> Source Code
                            </a>
                        @else
                            <a href="#" class="flex-1 text-center bg-gray-800/50 hover:bg-gray-800 text-gray-400 py-2.5 rounded-xl transition text-sm font-medium border border-gray-700 cursor-pointer" onclick="showLoginModal(event)">
                                <i class="fa-solid fa-lock mr-1.5"></i> Source Code
                            </a>
                        @endauth
                    </div>

                    @if(auth()->check() && auth()->user()->is_admin)
                    <div class="flex gap-2 mt-4 pt-4 border-t border-gray-700/50">
                        <a href="{{ route('admin.edit', $template->id) }}" class="flex-1 text-center bg-amber-500/10 text-amber-500 py-2 rounded-lg hover:bg-amber-500/20 transition text-xs font-medium border border-amber-500/20 hover:border-amber-500/50">
                            <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                        </a>
                        <form action="{{ route('admin.destroy', $template->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus template ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-center bg-red-500/10 text-red-500 py-2 rounded-lg hover:bg-red-500/20 transition text-xs font-medium border border-red-500/20 hover:border-red-500/50">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-gray-900/30 rounded-3xl border border-gray-800 border-dashed">
                <div class="text-6xl mb-4">📂</div>
                <h3 class="text-xl font-semibold text-gray-300 mb-2">Belum ada template</h3>
                <p class="text-gray-500">Jadilah yang pertama mengunggah template!</p>
            </div>
            @endforelse

        </div>
    </main>

    <footer class="border-t border-gray-800 py-10 mt-auto">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-500 text-sm mb-2">&copy; 2026 Ananda Ibrahim - Universitas Darma Persada.</p>
            <p class="text-gray-600 text-xs">Built with Laravel & <span class="text-red-500">❤️</span></p>
        </div>
    </footer>

    {{-- Custom Login Modal --}}
    <div id="loginModal" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on modal state. -->
        <div class="fixed inset-0 bg-black/80 backdrop-blur-sm transition-opacity opacity-0" id="modalBackdrop"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!-- Modal panel, show/hide based on modal state. -->
                <div class="relative transform overflow-hidden rounded-2xl bg-[#0a0a0a] border border-gray-800 text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" id="modalPanel">
                    
                    {{-- Decorative Blur --}}
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl -z-10"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl -z-10"></div>

                    <div class="bg-[#0a0a0a]/80 backdrop-blur-xl px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-500/10 sm:mx-0 sm:h-10 sm:w-10">
                                <i class="fa-solid fa-lock text-emerald-500 text-lg"></i>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-lg font-semibold leading-6 text-white" id="modal-title">Akses Terbatas</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-400">
                                        Source code template ini hanya tersedia untuk pengguna yang sudah terdaftar. Silakan login atau daftar untuk mengaksesnya.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#0a0a0a]/90 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-800">
                        <a href="{{ route('login') }}" class="inline-flex w-full justify-center rounded-lg bg-emerald-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-emerald-500 sm:ml-3 sm:w-auto transition-colors">
                            Login Sekarang
                        </a>
                        <button type="button" onclick="closeLoginModal()" class="mt-3 inline-flex w-full justify-center rounded-lg bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-300 shadow-sm ring-1 ring-inset ring-gray-700 hover:bg-gray-700 sm:mt-0 sm:w-auto transition-colors">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showLoginModal(event) {
            if(event) event.preventDefault();
            const modal = document.getElementById('loginModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            modal.classList.remove('hidden');
            
            // Animation In
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
                panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
            }, 10);
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal');
            const backdrop = document.getElementById('modalBackdrop');
            const panel = document.getElementById('modalPanel');

            // Animation Out
            backdrop.classList.add('opacity-0');
            panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
            panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close on backdrop click
        document.getElementById('loginModal').addEventListener('click', function(e) {
            if (e.target === document.getElementById('modalBackdrop') || 
                e.target.closest('.min-h-full') === e.target) {
                closeLoginModal();
            }
        });
    </script>
@endsection