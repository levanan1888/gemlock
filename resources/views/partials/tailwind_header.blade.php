<header
    class="sticky top-0 z-50 w-full border-b border-[#f4f1e7] dark:border-[#3d361c] bg-background-light/90 dark:bg-background-dark/90 backdrop-blur-md">
    <div class="px-4 md:px-10 lg:px-40 py-3 flex items-center justify-between max-w-[1440px] mx-auto">
        <div class="flex items-center gap-4">
            <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('image/Logo Tách Nền.png') }}" alt="Gemcorp Logo"
                    class="h-10 w-auto transition-transform group-hover:scale-110">
                <h2 class="text-[#1c190d] dark:text-white text-2xl font-extrabold tracking-tighter uppercase">
                    Gemcorp</h2>
            </a>
        </div>
        <div class="hidden md:flex items-center gap-10">
            <nav class="flex items-center gap-10">
                <a class="text-[13px] font-black uppercase tracking-widest hover:text-white transition-colors {{ request()->is('/') ? 'text-black' : 'text-black/60' }}"
                    href="{{ url('/') }}">HOME</a>
                <a class="text-[13px] font-black uppercase tracking-widest hover:text-white transition-colors {{ request()->is('shop') ? 'text-black' : 'text-black/60' }}"
                    href="{{ url('/shop') }}">PRODUCTS</a>
                <a class="text-[13px] font-black uppercase tracking-widest hover:text-white transition-colors text-black/60"
                    href="#">ABOUT</a>
                <a class="text-[13px] font-black uppercase tracking-widest hover:text-white transition-colors text-black/60"
                    href="#">NEWS</a>
            </nav>
            <div class="h-6 w-[2px] bg-black/20"></div>
            <a href="{{ url('/cart') }}" class="relative text-black hover:text-white transition-colors">
                <span class="text-xs font-black tracking-widest">CART [3]</span>
            </a>
            <button
                class="bg-black hover:bg-white text-primary hover:text-black px-10 py-4 rounded-none text-[10px] font-black uppercase tracking-[0.3em] transition-all border border-black">
                CONNECT
            </button>
        </div>
        <button class="md:hidden text-[#1c190d] dark:text-white">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </div>
</header>