@extends('layouts.app')
@push('scripts')
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
@endpush


@section('title', 'Sản Phẩm Gemcorp - Năng Lượng & Công Nghệ')

@section('content')
    @include('partials.header')
    @include('partials.section_category_video', ['videoTitle' => 'Danh mục sản phẩm GemLock', 'youtubeId' => null])
    <div class="px-4 md:px-10 lg:px-40 py-8 max-w-[1440px] mx-auto min-h-screen">
        <div class="reveal mb-8">
            <nav class="flex text-sm text-[#1c190d]/50 dark:text-[#f4f1e7]/50 mb-4" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li><a href="/" class="hover:text-primary transition-colors">Trang Chủ</a></li>
                    <li class="flex items-center space-x-2">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                        <span class="font-bold text-primary">Tất Cả Sản Phẩm</span>
                    </li>
                </ol>
            </nav>
            <h1 class="text-4xl font-extrabold text-[#1c190d] dark:text-white uppercase tracking-tight">Danh mục sản phẩm
            </h1>
        </div>

        <div
            class="reveal sticky top-[73px] z-40 bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-sm py-4 mb-8 -mx-4 px-4 sm:mx-0 sm:px-0 border-b border-white/10 dark:border-[#3a3525] sm:border-none glass-effect">
            <div class="flex gap-3 overflow-x-auto scrollbar-hide pb-2 sm:pb-0">
                <button
                    class="flex h-10 shrink-0 items-center justify-center rounded-full bg-primary text-[#1c190d] px-6 text-sm font-bold shadow-sm hover:shadow-md transition-all btn-hover-effect">
                    Tất Cả Sản Phẩm
                </button>
                @foreach(['Gemcorp Industrial', 'Gemcorp Consumer', 'Gemcorp Tech', 'Gemcorp Green'] as $cat)
                    <button
                        class="flex h-10 shrink-0 items-center justify-center rounded-full bg-[#f4f1e7] dark:bg-white/10 hover:bg-[#e9e3d0] dark:hover:bg-white/20 text-[#1c190d] dark:text-[#f4f1e7] px-6 text-sm font-medium transition-colors border border-transparent dark:border-white/5 btn-hover-effect">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="reveal grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pb-12">
            @for($i = 1; $i <= 8; $i++)
                <div
                    class="group flex flex-col bg-surface-light dark:bg-surface-dark rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 border border-transparent hover:border-primary/20 relative">
                    <div class="relative aspect-square overflow-hidden bg-gray-50 dark:bg-[#363225]/50">
                        <div class="absolute top-3 right-3 z-10">
                            <span
                                class="px-2.5 py-1 rounded-md bg-[#1e2586]/90 backdrop-blur-sm text-[10px] font-bold uppercase tracking-widest text-white shadow-sm">Miễn
                                phí lắp đặt</span>
                        </div>
                        <div class="w-full h-full bg-contain bg-no-repeat bg-center transition-transform duration-700 group-hover:scale-105 p-8"
                            style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCxLXosH3C2WS2uFYFolhD-1QHjwlIu5dJkq74N3cmhnDQXgJSKhEmHM3mrj6BY2Y-c6V2EAkhKso2izI23Vbhkcefo-rvWDHGyOIH9hQty1ghCflw8-FOJLX2c-3kTRGj3s19AlQa_YWn4fW7CRZCIAjzae62rakjxl8CxQkjpZKG1Qb_OXTk7NFl1YPFtwLGJD0x0izdhksLtYiTpg9k_VHCXmomnLw9Qg9UA0XqsRJ68nZtTf8jP4JBlzJMFG4GVD6yMsOWRogE")'>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-1 gap-2 border-t border-gray-100 dark:border-white/5 text-center">
                        <h3
                            class="text-[#1c190d] dark:text-white text-sm font-bold leading-snug uppercase group-hover:text-primary transition-colors min-h-[2.5rem] flex items-center justify-center line-clamp-2">
                            <a href="{{ route('product.detail') }}" style="color: inherit; text-decoration: none;">KHÓA THÔNG MINH CAO CẤP GEM - N81B</a></h3>
                        <div class="flex justify-center text-primary text-xs gap-0.5 mb-1">
                            @for($j = 0; $j < 5; $j++)
                                <span class="material-symbols-outlined text-[16px]">star</span>
                            @endfor
                        </div>
                        <p class="text-primary font-bold text-xl mb-3 tracking-tight">9,900,000₫</p>
                        <div class="mt-auto flex flex-col gap-2.5 w-full">
                            <button
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-bold text-xs py-3 rounded-lg uppercase tracking-wider transition-all shadow-sm btn-hover-effect">Mua
                                Ngay</button>
                            <button
                                class="w-full border border-primary/50 hover:border-primary text-[#1c190d] dark:text-primary hover:bg-primary hover:text-[#1c190d] font-bold text-xs py-2.5 rounded-lg uppercase tracking-wider transition-all flex items-center justify-center gap-2 btn-hover-effect">
                                <span class="material-symbols-outlined text-[16px]"
                                    style="font-variation-settings: 'FILL' 0;">chat</span> Giá tốt qua Zalo
                            </button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection