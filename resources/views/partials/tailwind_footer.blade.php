<footer class="bg-background-dark text-white pt-20 pb-10 px-4 md:px-10 lg:px-40">
    <div class="max-w-[1440px] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-4">
                    <span class="text-2xl font-black uppercase tracking-tighter text-white">Gemcorp</span>
                </div>
                <p class="text-white/60 text-sm leading-relaxed mt-6">
                    Hệ sinh thái toàn cầu thúc đẩy đổi mới sáng tạo trong công nghệ, giáo dục và tài chính.
                </p>
                <div class="mt-10 flex gap-4">
                    @php
                        $socials = ['facebook', 'linkedin', 'youtube'];
                    @endphp
                    @foreach ($socials as $social)
                        <a href="#"
                            class="w-12 h-12 border border-white/10 hover:border-primary flex items-center justify-center transition-all group">
                            <span
                                class="text-white/40 group-hover:text-primary font-black uppercase text-[10px]">{{ substr($social, 0, 2) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-12">
                <div>
                    <h4 class="text-white font-black uppercase tracking-[0.2em] text-xs mb-8">Hệ Sinh Thái</h4>
                    <ul class="space-y-4">
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Gem
                                Smart Lock</a></li>
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Gem
                                Solar</a></li>
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Perfect
                                House</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black uppercase tracking-[0.2em] text-xs mb-8">Liên Kết</h4>
                    <ul class="space-y-4">
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Giới
                                Thiệu</a></li>
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Tuyển
                                Dụng</a></li>
                        <li><a href="#"
                                class="text-white/50 hover:text-primary transition-colors text-sm font-bold uppercase tracking-widest">Liên
                                Hệ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-black uppercase tracking-[0.2em] text-xs mb-8">Newsletter</h4>
                    <p class="text-white/40 text-xs mb-6 font-bold uppercase tracking-widest">Đăng ký để nhận thông tin
                        mới nhất.</p>
                    <form class="flex flex-col gap-0 border border-white/10 p-2">
                        <input type="email" placeholder="Email của bạn"
                            class="bg-transparent border-none text-white text-xs p-4 focus:ring-0 uppercase tracking-widest font-black placeholder:text-white/20">
                        <button type="submit"
                            class="bg-primary text-black py-4 font-black uppercase tracking-[0.2em] text-[10px] hover:bg-white transition-all">Đăng
                            Ký</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-24 pt-10 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-white/20 text-[10px] font-black uppercase tracking-widest">
                &copy; {{ date('Y') }} GEMCORP INDUSTRIAL. ALL RIGHTS RESERVED.
            </p>
            <div class="flex gap-10">
                <a href="#"
                    class="text-white/20 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors">Privacy
                    Policy</a>
                <a href="#"
                    class="text-white/20 hover:text-white text-[10px] font-black uppercase tracking-widest transition-colors">Terms
                    of Service</a>
            </div>
        </div>
    </div>
</footer>