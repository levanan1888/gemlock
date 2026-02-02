<!DOCTYPE html>
<html class="light" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Gemcorp - Hệ Sinh Thái Toàn Diện')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#f2c10d",
                        "primary-dark": "#d4a90b",
                        secondary: "#e63946",
                        "background-light": "#f2c10d",
                        "background-dark": "#d9ad0b",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1a1810",
                        "gold-price": "#f2c10d",
                    },
                    fontFamily: {
                        "sans": ["Inter", "sans-serif"],
                        "display": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0",
                        "lg": "0",
                        "xl": "0",
                        "2xl": "0",
                        "3xl": "0",
                        "4xl": "0",
                        "full": "0"
                    },
                    backgroundImage: {
                        'hero-gradient': 'linear-gradient(135deg, #fcfbf8 0%, #fffdf5 60%, #fcf0c2 100%)',
                        'hero-gradient-dark': 'linear-gradient(135deg, #221e10 0%, #2e2a1b 60%, #3d361c 100%)',
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 0.2s;
        }

        .animation-delay-400 {
            animation-delay: 0.4s;
        }
    </style>
    @stack('styles')
</head>

<body
    class="bg-background-light dark:bg-background-dark text-[#1c190d] dark:text-[#f4f1e7] transition-colors duration-300">

    @include('partials.tailwind_header')

    <main>
        @yield('content')
    </main>

    @include('partials.tailwind_footer')

    <script>
        // Scroll Reveal Animation
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    entry.target.style.opacity = '1';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.reveal').forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });
    </script>
    @stack('scripts')
</body>

</html>