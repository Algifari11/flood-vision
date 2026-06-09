<x-app-layout>
    @section('title', 'Kelola Video')
    
    <div class="py-8 pb-32 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            @if (session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center gap-3 text-sm font-semibold shadow-sm animate-[slideDown_0.2s_ease-out]">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl flex items-center gap-3 text-sm font-semibold shadow-sm animate-[slideDown_0.2s_ease-out]">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6 pb-2">
                <div class="space-y-1">
                    <h2 class="text-2xl font-black text-slate-800 tracking-tight flex items-center gap-3">
                        <span class="p-2.5 bg-amber-500/10 text-amber-600 rounded-2xl backdrop-blur-sm">
                            <i data-lucide="video" class="w-5 h-5"></i>
                        </span>
                        Pusat Kendali Dokumentasi Video
                    </h2>
                    <p class="text-slate-500 font-medium text-sm max-w-2xl">
                        Unggah video pemantauan banjir atau perbarui konten edukasi bencana warga untuk sistem Mori Nalove.
                    </p>
                </div>
                <div class="bg-white/40 backdrop-blur-md border border-white/50 rounded-2xl p-3 flex items-center gap-4 shadow-sm w-fit shrink-0">
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Sisi Kiri: Form Upload (5/12) -->
                <div class="lg:col-span-5">
                    @include('admin.partials.form-upload')
                </div>

                <!-- Sisi Kanan: List Video & Status AI YOLO (7/12) -->
                <div class="lg:col-span-7">
                    @include('admin.partials.list-video')
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
    
    <script src="{{ asset('js/kelola-video.js') }}"></script>

    <style>
        #videoListContainer *, 
        #videoListContainer p, 
        #videoListContainer span, 
        #videoListContainer div {
            overflow: visible !important;
            text-overflow: unset !important;
            white-space: normal !important;
            word-break: break-word !important;
            max-width: 100% !important;
        }
    </style>
</x-app-layout>