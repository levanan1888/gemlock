@extends('layouts.app')

@section('title', 'Trang Chủ Gemcorp - Slider & Hệ Sinh Thái')

@section('content')
    @include('partials.header')
    <section class="reveal relative h-[85vh] min-h-[600px] w-full overflow-hidden group">
        <div class="absolute inset-0 transition-opacity duration-1000">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB6iLQh-XCO3H0liKdyySM5FTpDJGg-CESk_l-PsrphNHchj_HgspwrhJhOBhNgFNTiaLbr83Mi6Z5zODrMl_PAVI22ZvB9jvN7QN5onxpW7sbTEb-eSwKLfEPc-jaUDFGjgjPzqVUDO66UbZVFFvnVMBRCa0c2SQZ59RISnIWyhKvpf8-pxl43LUzfzhsBSsh5oRFIs5nly9e7sVn7k6uaUcCrgT7NYtwz4QUU97FklQ2pnTzGxGWeKY0Vhe4_qT21bKvuVkevM3Q');">
                <div class="absolute inset-0 bg-black/40 dark:bg-black/60"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
            </div>
            <div class="relative h-full max-w-[1440px] mx-auto px-4 md:px-10 lg:px-40 flex flex-col justify-center">
                <div class="max-w-3xl space-y-6">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 w-fit text-white">
                        <span class="w-2 h-2 rounded-full bg-primary"></span>
                        <span class="text-xs font-bold uppercase tracking-wider">Hệ Sinh Thái Toàn Diện</span>
                    </div>
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold leading-[1.1] tracking-tight text-white">
                        KIẾN TẠO <br />
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-[#ffe66d] to-primary">TƯƠNG
                            LAI BỀN VỮNG</span>
                    </h1>
                    <p class="text-xl text-white/90 max-w-xl font-light leading-relaxed">
                        Gemcorp mang đến giải pháp đột phá trong năng lượng xanh, công nghệ an ninh và kiến trúc thông
                        minh, nâng tầm chất lượng cuộc sống Việt.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <button
                            class="bg-primary hover:bg-[#e0b20c] text-[#1c190d] h-14 px-10 rounded-full text-base font-bold transition-all shadow-lg shadow-primary/20 flex items-center justify-center gap-2 group/btn btn-hover-effect">
                            Khám Phá Ngay
                            <span
                                class="material-symbols-outlined text-[20px] group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                        <button
                            class="bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 text-white h-14 px-10 rounded-full text-base font-bold transition-all btn-hover-effect">
                            Tìm Hiểu Thêm
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-12 left-0 right-0 z-20 px-4 md:px-10 lg:px-40">
            <div class="max-w-[1440px] mx-auto flex items-end justify-between">
                <div class="flex gap-3">
                    <button class="w-12 h-1 rounded-full bg-primary transition-all"></button>
                    <button class="w-2 h-1 rounded-full bg-white/30 hover:bg-white/60 transition-all"></button>
                    <button class="w-2 h-1 rounded-full bg-white/30 hover:bg-white/60 transition-all"></button>
                    <button class="w-2 h-1 rounded-full bg-white/30 hover:bg-white/60 transition-all"></button>
                </div>
                <div class="hidden md:flex gap-4">
                    <button
                        class="w-14 h-14 rounded-full border border-white/20 bg-black/20 backdrop-blur-md text-white flex items-center justify-center hover:bg-primary hover:border-primary hover:text-[#1c190d] transition-all duration-300">
                        <span class="material-symbols-outlined">west</span>
                    </button>
                    <button
                        class="w-14 h-14 rounded-full border border-white/20 bg-black/20 backdrop-blur-md text-white flex items-center justify-center hover:bg-primary hover:border-primary hover:text-[#1c190d] transition-all duration-300">
                        <span class="material-symbols-outlined">east</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="reveal py-24 px-4 md:px-10 lg:px-40 bg-background-light dark:bg-background-dark">
        <div class="max-w-[1440px] mx-auto flex flex-col gap-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="flex flex-col gap-4 max-w-[720px]">
                    <span class="text-primary font-bold uppercase tracking-wider text-sm">Lĩnh Vực Hoạt Động</span>
                    <h2 class="text-4xl md:text-5xl font-bold leading-tight text-[#1c190d] dark:text-white">Hệ Sinh Thái
                        Đa Ngành</h2>
                </div>
                <p class="text-[#1c190d]/60 dark:text-[#f4f1e7]/60 text-lg max-w-md text-right md:text-right">
                    Tập hợp các thương hiệu chuyên biệt dẫn đầu về đổi mới và chất lượng.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <a class="group relative h-[480px] rounded-[2rem] overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500"
                    href="#">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBlezDhryrjO5jg9Ak5MYC-mMjmvjAWGXh5tDf_snf_sJUWGRWXhBjNbaNV4bRq0cl3Ta2j74HC7x1k8C8NgbldDqELN4yB9U8rCEOiVmGUpx7BshZislJ-B-h01nIaF5ciAAbIKV5fI1DhrHUw1y6OsFZOJs9dZ9QmoD-sh-ojRyZTCdY730RqglKcwy9VRHuyjJ8MNurfcFRUBitvk8vRXIMr54EGrMqHD5R5HEip31kwRUBKwzO04dfS0sllYfI5NpFVyRUpXHE');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="w-14 h-14 rounded-xl bg-primary/20 backdrop-blur-md border border-primary/30 flex items-center justify-center mb-4 text-primary">
                            <span class="material-symbols-outlined text-3xl">fingerprint</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">GEM SMART LOCK</h3>
                        <p class="text-white/70 text-sm line-clamp-2 mb-6 group-hover:text-white/90 transition-colors">
                            Công nghệ khóa thông minh nhận diện sinh trắc học, bảo vệ an toàn tuyệt đối.
                        </p>
                        <div
                            class="flex items-center gap-2 text-primary font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Xem Chi Tiết <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </div>
                    </div>
                </a>
                <a class="group relative h-[480px] rounded-[2rem] overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500"
                    href="#">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDcGRwTuPoagq37pip_qeVQ5rGo_LGHkpS2IBj70EaOJeo7o-t1VLt6MUWgiX8Rf2nS5p-cRF5NUWSjKnUV3xuE7ObAkYmjGwRoomDtUXyaQp8dsq3FRakDtpt-L5VTwo8VIGAUoDlc2alvHURZA0ES7jUE7KtTvZNBP9c_2-7g1vyJiHlrr9dcZDQtTU6CT5Wu6OBpbp0Jx3mc1kB_WkYzyCQK1DCkgviPRHv8BSv4W7cCPiESXSIUfdS6DqTeQ4ZDS2yUYKFIcL0');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="w-14 h-14 rounded-xl bg-primary/20 backdrop-blur-md border border-primary/30 flex items-center justify-center mb-4 text-primary">
                            <span class="material-symbols-outlined text-3xl">solar_power</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">GEM SOLAR</h3>
                        <p class="text-white/70 text-sm line-clamp-2 mb-6 group-hover:text-white/90 transition-colors">
                            Giải pháp điện năng lượng mặt trời áp mái, tiết kiệm chi phí và bảo vệ môi trường.
                        </p>
                        <div
                            class="flex items-center gap-2 text-primary font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Xem Chi Tiết <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </div>
                    </div>
                </a>
                <a class="group relative h-[480px] rounded-[2rem] overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-500"
                    href="#">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBBWbjsDm_Y2wOisKQG6XL-uiXDuWLdrXcyv2WSv4acZ652KzjV1kL89o3s4Iww5MS02x8aZCZydOLShvH5DUwvXbpUUVmnct5iIXy9DiSp-ch3AlvB0kQcB-ddGWIjL-aCgqAQOBu3DddOMLqTCV5XaDjnVjYDlNwQwxmd8tnq9fX8HduZFhDi5JsoDs6WlODiVHEFjxq7I0GVWHwqFe8eZYT0qpzlAMf7d__DCi1ZDhXoHY7vDkmAo485fUQkW_e9AbgtJ_Xpyb4');">
                    </div>
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <div
                            class="w-14 h-14 rounded-xl bg-primary/20 backdrop-blur-md border border-primary/30 flex items-center justify-center mb-4 text-primary">
                            <span class="material-symbols-outlined text-3xl">home_work</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">PERFECT HOUSE</h3>
                        <p class="text-white/70 text-sm line-clamp-2 mb-6 group-hover:text-white/90 transition-colors">
                            Thiết kế và thi công nội ngoại thất, cửa nhôm kính cao cấp cho ngôi nhà hoàn hảo.
                        </p>
                        <div
                            class="flex items-center gap-2 text-primary font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                            Xem Chi Tiết <span class="material-symbols-outlined text-lg">arrow_forward</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="reveal py-24 px-4 md:px-10 lg:px-40 bg-[#f9f9f7] dark:bg-[#282415] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full blur-[100px] pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#b8920a]/5 rounded-full blur-[100px] pointer-events-none">
        </div>
        <div class="max-w-[1440px] mx-auto relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl aspect-[4/3] group">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent z-10">
                        </div>
                        <img alt="Hệ thống điện năng lượng mặt trời áp mái"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcGRwTuPoagq37pip_qeVQ5rGo_LGHkpS2IBj70EaOJeo7o-t1VLt6MUWgiX8Rf2nS5p-cRF5NUWSjKnUV3xuE7ObAkYmjGwRoomDtUXyaQp8dsq3FRakDtpt-L5VTwo8VIGAUoDlc2alvHURZA0ES7jUE7KtTvZNBP9c_2-7g1vyJiHlrr9dcZDQtTU6CT5Wu6OBpbp0Jx3mc1kB_WkYzyCQK1DCkgviPRHv8BSv4W7cCPiESXSIUfdS6DqTeQ4ZDS2yUYKFIcL0" />
                        <div class="absolute bottom-8 left-8 right-8 z-20 flex flex-col md:flex-row gap-4">
                            <div
                                class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex-1 text-white">
                                <div class="text-2xl font-bold text-primary mb-1">25+</div>
                                <div class="text-xs font-medium opacity-80 uppercase">Năm bảo hành</div>
                            </div>
                            <div
                                class="bg-white/10 backdrop-blur-md border border-white/20 p-4 rounded-2xl flex-1 text-white">
                                <div class="text-2xl font-bold text-primary mb-1">40%</div>
                                <div class="text-xs font-medium opacity-80 uppercase">Tiết kiệm chi phí</div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -z-10 -bottom-6 -right-6 w-full h-full rounded-[3rem] border-2 border-primary/20">
                    </div>
                </div>
                <div class="order-1 lg:order-2 flex flex-col gap-6">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">wb_sunny</span>
                        </div>
                        <span class="text-primary font-bold uppercase tracking-wider text-sm">Giải Pháp Năng Lượng
                            Xanh</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-[#1c190d] dark:text-white">
                        GEM SOLAR - <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-[#b8920a]">ĐIỆN NĂNG
                            LƯỢNG MẶT TRỜI</span>
                    </h2>
                    <p class="text-lg text-[#1c190d]/70 dark:text-[#f4f1e7]/70 leading-relaxed">
                        Gem Solar cung cấp giải pháp toàn diện về điện năng lượng mặt trời cho hộ gia đình và doanh
                        nghiệp. Chúng tôi cam kết mang đến nguồn năng lượng sạch, bền vững với hiệu suất cao nhất.
                    </p>
                    <div class="flex flex-col gap-6 mt-4">
                        <div class="flex gap-4 items-start">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-surface-light dark:bg-surface-dark shadow-md flex items-center justify-center text-primary border border-primary/10">
                                <span class="material-symbols-outlined">bolt</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold mb-1">Tiết kiệm điện năng</h4>
                                <p class="text-sm text-[#1c190d]/60 dark:text-[#f4f1e7]/60">Giảm thiểu chi phí tiền điện
                                    hàng tháng lên đến 90%, thu hồi vốn nhanh chóng.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-surface-light dark:bg-surface-dark shadow-md flex items-center justify-center text-primary border border-primary/10">
                                <span class="material-symbols-outlined">eco</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold mb-1">Bảo vệ môi trường</h4>
                                <p class="text-sm text-[#1c190d]/60 dark:text-[#f4f1e7]/60">Góp phần giảm phát thải khí
                                    CO2, kiến tạo môi trường sống xanh và bền vững.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-start">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-xl bg-surface-light dark:bg-surface-dark shadow-md flex items-center justify-center text-primary border border-primary/10">
                                <span class="material-symbols-outlined">precision_manufacturing</span>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold mb-1">Công nghệ hiện đại</h4>
                                <p class="text-sm text-[#1c190d]/60 dark:text-[#f4f1e7]/60">Sử dụng tấm pin năng lượng
                                    mặt trời thế hệ mới, hiệu suất chuyển đổi cao và bền bỉ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-[#1c190d]/10 dark:border-white/10">
                        <a class="inline-flex items-center gap-2 text-primary font-bold hover:underline group" href="#">
                            Tìm hiểu chi tiết về Gem Solar
                            <span
                                class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reveal py-24 px-4 md:px-10 lg:px-40 bg-background-light dark:bg-background-dark">
        <div class="max-w-[1440px] mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
                <div>
                    <span class="text-primary font-bold uppercase tracking-wider text-sm">Sản Phẩm Mới Nhất</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2 text-[#1c190d] dark:text-white">Sản Phẩm Nổi Bật</h2>
                </div>
                <div class="hidden md:flex gap-2">
                    <button
                        class="w-10 h-10 rounded-full border border-[#1c190d]/20 dark:border-white/20 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-[#1c190d] dark:text-white transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full border border-[#1c190d]/20 dark:border-white/20 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-[#1c190d] dark:text-white transition-colors">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $products = [
                        [
                            'name' => 'Khóa Cửa Vân Tay G1 Pro',
                            'brand' => 'Gem Smart Lock',
                            'price' => '5.890.000₫',
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBlezDhryrjO5jg9Ak5MYC-mMjmvjAWGXh5tDf_snf_sJUWGRWXhBjNbaNV4bRq0cl3Ta2j74HC7x1k8C8NgbldDqELN4yB9U8rCEOiVmGUpx7BshZislJ-B-h01nIaF5ciAAbIKV5fI1DhrHUw1y6OsFZOJs9dZ9QmoD-sh-ojRyZTCdY730RqglKcwy9VRHuyjJ8MNurfcFRUBitvk8vRXIMr54EGrMqHD5R5HEip31kwRUBKwzO04dfS0sllYfI5NpFVyRUpXHE',
                            'tag' => 'Mới',
                            'tag_color' => 'bg-primary'
                        ],
                        [
                            'name' => 'Gói Điện Mặt Trời 5kW',
                            'brand' => 'Gem Solar',
                            'price' => '65.000.000₫',
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDcGRwTuPoagq37pip_qeVQ5rGo_LGHkpS2IBj70EaOJeo7o-t1VLt6MUWgiX8Rf2nS5p-cRF5NUWSjKnUV3xuE7ObAkYmjGwRoomDtUXyaQp8dsq3FRakDtpt-L5VTwo8VIGAUoDlc2alvHURZA0ES7jUE7KtTvZNBP9c_2-7g1vyJiHlrr9dcZDQtTU6CT5Wu6OBpbp0Jx3mc1kB_WkYzyCQK1DCkgviPRHv8BSv4W7cCPiESXSIUfdS6DqTeQ4ZDS2yUYKFIcL0',
                            'tag' => '-15%',
                            'tag_color' => 'bg-red-500 text-white'
                        ],
                        [
                            'name' => 'Khóa Cửa Thẻ Từ S2',
                            'brand' => 'Gem Smart Lock',
                            'price' => '3.200.000₫',
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBlezDhryrjO5jg9Ak5MYC-mMjmvjAWGXh5tDf_snf_sJUWGRWXhBjNbaNV4bRq0cl3Ta2j74HC7x1k8C8NgbldDqELN4yB9U8rCEOiVmGUpx7BshZislJ-B-h01nIaF5ciAAbIKV5fI1DhrHUw1y6OsFZOJs9dZ9QmoD-sh-ojRyZTCdY730RqglKcwy9VRHuyjJ8MNurfcFRUBitvk8vRXIMr54EGrMqHD5R5HEip31kwRUBKwzO04dfS0sllYfI5NpFVyRUpXHE',
                            'tag' => null
                        ],
                        [
                            'name' => 'Biến Tần Inverter 10kW',
                            'brand' => 'Gem Solar',
                            'price' => '22.500.000₫',
                            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDcGRwTuPoagq37pip_qeVQ5rGo_LGHkpS2IBj70EaOJeo7o-t1VLt6MUWgiX8Rf2nS5p-cRF5NUWSjKnUV3xuE7ObAkYmjGwRoomDtUXyaQp8dsq3FRakDtpt-L5VTwo8VIGAUoDlc2alvHURZA0ES7jUE7KtTvZNBP9c_2-7g1vyJiHlrr9dcZDQtTU6CT5Wu6OBpbp0Jx3mc1kB_WkYzyCQK1DCkgviPRHv8BSv4W7cCPiESXSIUfdS6DqTeQ4ZDS2yUYKFIcL0',
                            'tag' => null
                        ]
                    ];
                @endphp

                @foreach($products as $product)
                    <div
                        class="bg-surface-light dark:bg-surface-dark rounded-[2rem] overflow-hidden shadow-lg border border-[#f4f1e7] dark:border-[#3d361c] group hover:-translate-y-2 transition-all duration-300">
                        <div class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-gray-800">
                            <img alt="{{ $product['name'] }}"
                                class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-500"
                                src="{{ $product['image'] }}" />
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-[#1c190d]/50 dark:text-[#f4f1e7]/50 uppercase font-bold mb-2">
                                {{ $product['brand'] }}</div>
                            <h3 class="text-lg font-bold text-[#1c190d] dark:text-white mb-2 line-clamp-1">
                                <a href="{{ route('product.detail', $product['slug']) }}" style="color: inherit; text-decoration: none;">{{ $product['name'] }}</a></h3>
                            <div class="flex items-center gap-1 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <span class="material-symbols-outlined text-sm text-yellow-400">star</span>
                                @endfor
                            </div>
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-gold-price text-xl font-bold">{{ $product['price'] }}</span>
                            </div>
                            <button
                                class="w-full mt-5 bg-primary hover:bg-[#e0b20c] text-[#1c190d] py-3 rounded-full text-sm font-bold shadow-md hover:shadow-lg transition-all btn-hover-effect">
                                Mua Ngay
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="reveal py-20 px-4 md:px-10 lg:px-40 bg-background-light dark:bg-background-dark">
        <div class="max-w-[1440px] mx-auto">
            <div class="text-center mb-16 max-w-2xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-[#1c190d] dark:text-white">Khách Hàng Nói Về Chúng
                    Tôi</h2>
                <p class="text-[#1c190d]/60 dark:text-[#f4f1e7]/60">Sự hài lòng của khách hàng là minh chứng rõ nhất cho
                    chất lượng dịch vụ của hệ sinh thái Gemcorp.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-surface-light dark:bg-surface-dark p-8 rounded-[2rem] border border-[#f4f1e7] dark:border-[#3d361c] relative shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-primary mb-4">
                        <span class="material-symbols-outlined text-4xl">format_quote</span>
                    </div>
                    <p class="text-lg font-medium leading-relaxed mb-8 text-[#1c190d] dark:text-[#f4f1e7]">
                        "Tôi đã lắp đặt hệ thống Gem Smart Lock cho toàn bộ chuỗi căn hộ dịch vụ của mình. Tính năng
                        quản lý từ xa thực sự tiện lợi và độ bảo mật thì tuyệt vời. Rất đáng đầu tư."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-cover bg-center"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDnB3cP0B_v37PKQE2SHTWAo8yd4WZ6eO-npChvzFUmV8ip_I2zex6gGdNvPBgF9CWWXBVlNszws3KdxUftkRsJj2FuvTGGeGyuMh_j8aq_S8Yuyhf7nrER4x9iJ2BCvfyYEox_CEf_CSdiVNXcfoSwWbR_QclQCfM1JbOGKNSwNONu9NkcsxfKsAmrTmdIlsnWgSX6k8xSwfeL-ObFTAraTokbi0Qo97ape5D_-3Myazwi9HpSdcy6fw7lNXyNrfb6tPO6PgNh5Yw');">
                        </div>
                        <div>
                            <p class="font-bold text-[#1c190d] dark:text-white">Nguyễn Văn An</p>
                            <p class="text-sm text-[#1c190d]/50 dark:text-[#f4f1e7]/50">CEO, Chuỗi Căn Hộ Luxury</p>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-surface-light dark:bg-surface-dark p-8 rounded-[2rem] border border-[#f4f1e7] dark:border-[#3d361c] relative shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-primary mb-4">
                        <span class="material-symbols-outlined text-4xl">format_quote</span>
                    </div>
                    <p class="text-lg font-medium leading-relaxed mb-8 text-[#1c190d] dark:text-[#f4f1e7]">
                        "Gem Solar đã giúp nhà máy của chúng tôi tiết kiệm được hơn 40% chi phí điện năng mỗi tháng. Đội
                        ngũ kỹ thuật thi công rất nhanh chóng và chuyên nghiệp."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-cover bg-center"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAmqU1lb8zEvUkZqUrlTUZXIIGEhmFeVam6egG28UrDRXtXD12IHNVShA3_KpApcALDuv5qQsfyy0Mkw6l_d20iXCzGcYZ5oaCKo_WYkX-f5wQVHfkvgL7DXpJ9NJGfudIsLTUQG2GsvCqzOeZkWycbKX-kNBy0jUTPnRbiMcqiT5LWC6EmH7fwhbglPbUGuJn0QVSDujyo_m6XKsbh9uGrgl9NWxxvK5BG6uFl60R7Rhr0G2uiCv26xVuLTTpmobrRfkZK1Al_xss');">
                        </div>
                        <div>
                            <p class="font-bold text-[#1c190d] dark:text-white">Trần Thị Mai</p>
                            <p class="text-sm text-[#1c190d]/50 dark:text-[#f4f1e7]/50">Giám Đốc Sản Xuất, Mai Son Group
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mt-16 pt-10 border-t border-[#f4f1e7] dark:border-[#3d361c] flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                @foreach(['VinGroup', 'SunGroup', 'NovaLand', 'DatXanh', 'HungThinh'] as $partner)
                    <span
                        class="text-xl font-bold tracking-widest text-[#1c190d]/40 dark:text-white/40 uppercase">{{ $partner }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="reveal px-4 md:px-10 lg:px-40 pb-20">
        <div
            class="max-w-[1440px] mx-auto bg-background-dark dark:bg-primary rounded-[2.5rem] p-10 md:p-16 relative overflow-hidden text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/5 dark:bg-black/5 rounded-full pointer-events-none">
            </div>
            <div class="relative z-10 max-w-xl">
                <h2 class="text-3xl md:text-4xl font-bold text-white dark:text-[#1c190d] mb-4">Bạn đã sẵn sàng nâng tầm
                    cuộc sống?</h2>
                <p class="text-white/70 dark:text-[#1c190d]/70 text-lg">Liên hệ ngay với Gemcorp để nhận tư vấn về các
                    giải pháp công nghệ và năng lượng tối ưu nhất.</p>
            </div>
            <div class="relative z-10 flex-shrink-0">
                <button
                    class="bg-primary dark:bg-background-dark dark:text-white text-[#1c190d] hover:brightness-110 px-8 py-4 rounded-full text-lg font-bold transition-all shadow-lg flex items-center gap-2 btn-hover-effect">
                    Nhận Tư Vấn Miễn Phí
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </div>
    </section>
@endsection