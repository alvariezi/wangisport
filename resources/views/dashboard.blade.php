<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WANGISPORT</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: '#10B981', // Warna hijau utama WANGISPORT
                    }
                }
            }
        }
    </script>

<x-layouts::app :title="__('Dashboard')">
    <main class="flex-1 p-6 md:p-8 overflow-y-auto">
        <!-- Top Bar Header -->
        <header class="bg-zinc-950 border border-zinc-800 rounded-2xl p-4 mb-8 flex justify-between items-center shadow-sm">
            <div class="flex items-center">
                <span class="font-bold text-emerald-500 tracking-wider">WANGI</span>
                <span class="font-bold text-white tracking-wider">SPORT</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></span>
                <span class="text-sm text-zinc-400">Sistem Aktif</span>
            </div>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Card 1 -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold text-slate-400">Total Booking Hari ini</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">24</h3>
                        <p class="text-[11px] text-emerald-600 font-medium mt-1">↑ 20% <span class="text-slate-400 font-normal">dari kemarin</span></p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold text-slate-400">Pendapatan Hari ini</p>
                        <h3 class="text-xl font-bold text-slate-800 mt-1">Rp 4.320.000</h3>
                        <p class="text-[11px] text-emerald-600 font-medium mt-1">↑ 32% <span class="text-slate-400 font-normal">dari kemarin</span></p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600">
                        <i data-lucide="wallet" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold text-slate-400">Total Pengunjung</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">18</h3>
                        <p class="text-[11px] text-emerald-600 font-medium mt-1">↑ 15% <span class="text-slate-400 font-normal">dari kemarin</span></p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
                        <i data-lucide="users" class="w-5 h-5"></i>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold text-slate-400">Rating Lapangan</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">4.8 <span class="text-xs text-slate-400 font-normal">/ 5</span></h3>
                        <p class="text-[11px] text-slate-400 font-normal mt-1">Berdasarkan 128 ulasan</p>
                    </div>
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-600">
                        <i data-lucide="star" class="w-5 h-5"></i>
                    </div>
                </div>
            </div>
    </main>
    
</x-layouts::app>
