@extends('layouts.app')
@push('scripts')
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
@endpush


@section('title', 'Sản Phẩm - Hệ Sinh Thái Gemcorp')

@section('content')
    @include('partials.header')
    <main class="py-8 px-4 md:px-10 lg:px-40">
        <div class="max-w-[1440px] mx-auto">
            <div class="flex items-center gap-2 mb-6 px-1">
                <a class="text-[#9c8a49] hover:text-primary text-sm font-medium transition-colors"
                    href="{{ url('/') }}">Trang Chủ</a>
                <span class="text-[#9c8a49] text-[10px] font-black mx-2">/</span>
                <span class="text-[#1c190d] dark:text-white text-sm font-medium">Sản Phẩm Hệ Sinh Thái</span>
            </div>

            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 px-1">
                <div class="flex flex-col gap-3 max-w-2xl">
                    <h1 class="text-[#1c190d] dark:text-white text-4xl md:text-5xl font-black leading-[1.1] tracking-tight">
                        Hệ Sinh Thái Gemcorp</h1>
                    <p class="text-[#9c8a49] text-lg md:text-xl font-normal leading-relaxed">
                        Khám phá các giải pháp đổi mới trên bốn lĩnh vực riêng biệt của chúng tôi, được thiết kế để cung cấp
                        năng lượng cho tương lai.
                    </p>
                </div>
            </div>

            <div
                class="sticky top-[73px] z-40 bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-sm py-6 mb-12 border-b border-[#f4f1e7] dark:border-[#3d361c]">
                <div class="flex gap-0 overflow-x-auto scrollbar-hide">
                    <button
                        class="flex h-12 shrink-0 items-center justify-center bg-primary text-[#1c190d] px-10 text-[10px] font-black uppercase tracking-[0.2em] transition-all">Tất
                        Cả</button>
                    <button
                        class="flex h-12 shrink-0 items-center justify-center bg-transparent hover:bg-black hover:text-white text-[#1c190d] dark:text-[#f4f1e7] px-10 text-[10px] font-black uppercase tracking-[0.2em] transition-all border-l border-[#f4f1e7] dark:border-[#3d361c]">Industrial</button>
                    <button
                        class="flex h-12 shrink-0 items-center justify-center bg-transparent hover:bg-black hover:text-white text-[#1c190d] dark:text-[#f4f1e7] px-10 text-[10px] font-black uppercase tracking-[0.2em] transition-all border-l border-[#f4f1e7] dark:border-[#3d361c]">Consumer</button>
                    <button
                        class="flex h-12 shrink-0 items-center justify-center bg-transparent hover:bg-black hover:text-white text-[#1c190d] dark:text-[#f4f1e7] px-10 text-[10px] font-black uppercase tracking-[0.2em] transition-all border-l border-[#f4f1e7] dark:border-[#3d361c]">Tech</button>
                </div>
            </div>

            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-0 border border-[#f4f1e7] dark:border-[#3d361c]">
                <!-- Product Card -->
                <div
                    class="group flex flex-col bg-surface-light dark:bg-surface-dark border-[#f4f1e7] dark:border-[#3d361c] hover:bg-black transition-all duration-500 reveal">
                    <div
                        class="relative aspect-square overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-1000 p-12">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCxLXosH3C2WS2uFYFolhD-1QHjwlIu5dJkq74N3cmhnDQXgJSKhEmHM3mrj6BY2Y-c6V2EAkhKso2izI23Vbhkcefo-rvWDHGyOIH9hQty1ghCflw8-FOJLX2c-3kTRGj3s19AlQa_YWn4fW7CRZCIAjzae62rakjxl8CxQkjpZKG1Qb_OXTk7NFl1YPFtwLGJD0x0izdhksLtYiTpg9k_VHCXmomnLw9Qg9UA0XqsRJ68nZtTf8jP4JBlzJMFG4GVD6yMsOWRogE"
                            class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-8 flex flex-col flex-1 gap-6 border-t border-[#f4f1e7] dark:border-[#3d361c]">
                        <div class="flex flex-col gap-2">
                            <span class="text-[10px] text-primary font-black uppercase tracking-widest">GEM SMART
                                LOCK</span>
                            <h3
                                class="text-lg font-black text-[#1c190d] dark:text-white group-hover:text-white transition-colors uppercase leading-tight">
                                <a href="{{ route('product.detail') }}" style="color: inherit; text-decoration: none;">KHÓA THÔNG MINH CAO CẤP G-N81B</a>
                            </h3>
                        </div>
                        <p class="text-2xl font-black text-primary font-mono tracking-tighter">9,900,000đ</p>
                        <div class="mt-auto flex flex-col gap-0 border border-primary/30">
                            <button
                                class="w-full bg-primary hover:bg-white text-black font-black text-[10px] py-4 uppercase tracking-[0.2em] transition-all">Mua
                                Ngay</button>
                            <button
                                class="w-full bg-transparent hover:bg-primary text-[#1c190d] dark:text-primary hover:text-black font-black text-[10px] py-4 uppercase tracking-[0.2em] transition-all border-t border-primary/30">Zalo
                                Chat</button>
                        </div>
                    </div>
                </div>
                <!-- More product cards can be added here -->
            </div>
        </div>
    </main>
@endsection