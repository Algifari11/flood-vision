<x-app-layout>
    @section('title', 'Detail Laporan Warga')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-md overflow-hidden shadow-sm rounded-3xl border border-slate-200/60 p-8">
                
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.citizen_reports.index') }}" class="p-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-2xl shadow-sm transition-colors">
                            <i data-lucide="arrow-left" class="w-5 h-5"></i>
                        </a>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 tracking-tight">Detail Informasi Laporan Warga</h3>
                            <p class="text-sm text-slate-500 mt-1">Laporan kondisi genangan yang dikirimkan oleh warga.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Kiri: Foto Bukti -->
                    <div>
                        <span class="text-xs uppercase font-extrabold text-slate-400 block mb-3">Foto Bukti Lapangan</span>
                        @if($report->foto_bukti)
                            <div class="w-full rounded-2xl overflow-hidden border border-slate-200 shadow-sm bg-slate-50 relative group">
                                <img src="{{ asset('storage/' . $report->foto_bukti) }}" alt="Foto Bukti" class="w-full h-auto object-cover max-h-[450px]">
                                <a href="{{ asset('storage/' . $report->foto_bukti) }}" target="_blank" class="absolute bottom-4 right-4 bg-slate-900/80 hover:bg-slate-900 text-white px-3 py-1.5 rounded-xl text-xs font-bold transition-colors flex items-center gap-1.5 shadow-md">
                                    <i data-lucide="external-link" class="w-4 h-4"></i> Lihat Ukuran Penuh
                                </a>
                            </div>
                        @else
                            <div class="w-full h-64 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400 bg-slate-50/50">
                                <i data-lucide="image-off" class="w-12 h-12 text-slate-300 mb-2"></i>
                                <span class="text-sm font-semibold">Tidak ada foto bukti terlampir</span>
                            </div>
                        @endif
                    </div>

                    <!-- Kanan: Detail Informasi -->
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 shadow-sm">
                                <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Tanggal Laporan</span>
                                <span class="text-sm font-bold text-slate-700">{{ $report->created_at->format('d M Y, H:i') }} WITA</span>
                            </div>
                            <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 shadow-sm">
                                <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Pelapor</span>
                                <span class="text-sm font-bold text-slate-700">{{ $report->user ? $report->user->name : 'Anonim' }}</span>
                            </div>
                            <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 shadow-sm">
                                <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Lokasi (Aliran Sungai)</span>
                                <span class="text-sm font-extrabold text-slate-800">{{ $report->lokasi }}</span>
                            </div>
                            <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 shadow-sm">
                                <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Tingkat Genangan</span>
                                <div class="mt-1">
                                    @if($report->tingkat_genangan == 'Tinggi')
                                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-red-100 text-red-700 border border-red-200 inline-block shadow-sm">Tinggi</span>
                                    @elseif($report->tingkat_genangan == 'Sedang')
                                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-orange-100 text-orange-700 border border-orange-200 inline-block shadow-sm">Sedang</span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-bold rounded-lg bg-blue-100 text-blue-700 border border-blue-200 inline-block shadow-sm">Rendah</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50/80 p-5 rounded-2xl border border-slate-100 shadow-sm">
                            <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Catatan / Deskripsi Tambahan</span>
                            <p class="text-sm font-semibold text-slate-700 leading-relaxed whitespace-pre-wrap">{{ $report->deskripsi ?: 'Tidak ada catatan tambahan.' }}</p>
                        </div>

                        <div class="bg-slate-50/80 p-4 rounded-2xl border border-slate-100 shadow-sm">
                            <span class="text-[10px] uppercase font-extrabold text-slate-400 block mb-1">Status Verifikasi</span>
                            <div class="mt-1">
                                @if($report->status == 'Pending')
                                    <span class="px-3 py-1 text-xs font-bold rounded-lg bg-amber-100 text-amber-700 border border-amber-200 inline-block shadow-sm">Pending</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-bold rounded-lg bg-emerald-100 text-emerald-700 border border-emerald-200 inline-flex items-center gap-1 shadow-sm">
                                        <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Terverifikasi
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</x-app-layout>
