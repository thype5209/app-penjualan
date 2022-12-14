<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Irsan Jaya') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('build/assets/app.6440f46b.css') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js' ])
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <link rel="stylesheet" href="css/libs/animate.css">
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}">

    <script src="{{ asset('js/wow.js') }}"></script>

    {{--
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" /> --}}

</head>

<body class="overflow-x-hidden bg-gray-800 h-screen max-h-screen overflow-y-auto">
    <!-- component -->
    <header x-data="{ isOpen: false }"
        class=" bg-gray-800 text-white md:bg-transparent  shadow-lg absolute top-0 z-[1000] w-full ">
        <nav class="container mx-auto px-6 py-3">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <a class="text-white font-Times text-xl font-bold md:text-2xl bg-gray-800 text-white rounded-full px-3 group-hover:bg-gray-800 text-white"
                            href="#">
                            Irsan Jaya
                        </a>

                        <!-- Search input on desktop screen -->
                        <div class="mx-10 hidden md:block">
                            {{-- {{route('shop', ['jenis'=> $item->id])}} --}}
                            <form action="{{ route('shop') }}" method="get">
                                @csrf
                                <input type="search"
                                    class="w-32 lg:w-64 px-4 py-3 leading-tight text-sm  bg-gray-100 rounded-md placeholder-gray-500 border border-transparent focus:outline-none focus:bg-gray-800 text-white focus:shadow-outline focus:border-blue-400"
                                    placeholder="Search" name="jenis" aria-label="Search">
                                <button type="submit" class=" bg-gray-800 text-white p-2 rounded-sm">Cari</button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button @click="isOpen = !isOpen" type="button"
                            class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="md:flex items-center" :class="isOpen ? 'block' : 'hidden'">
                    <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                        <a class="my-1 text-sm font-bold text-white leading-5 hover:text-blue-100 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('home') }}">Home</a>
                        <a class="my-1 text-sm font-bold text-white leading-5 hover:text-blue-100 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('shop') }}">Belanja</a>
                        <a class="my-1 text-sm font-bold text-white leading-5 hover:text-blue-100 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('Promo-Diskon') }}">Promo</a>
                        <a class="my-1 text-sm font-bold text-white leading-5 hover:text-blue-100 hover:underline md:mx-4 md:my-0 tracking-wide"
                            href="{{ route('Keranjang') }}">Keranjang</a>
                    </div>

                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        @if (Auth::check())
                            @can('Manage-Customer')
                                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                    href="{{ route('Customer.Dashboard-User') }}">Dashboard</a>
                            @endcan
                            @can('Manage-Admin')
                                <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                    href="{{ route('Admin.Dashboard-Admin') }}">Dashboard</a>
                            @endcan
                        @else
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-gray-500 font-medium text-white leading-5 hover:bg-blue-600 md:mx-2 md:w-auto"
                                href="{{ route('login') }}">Login</a>
                            <a class="block w-1/2 px-3 py-2 mx-1 rounded text-center text-sm bg-green-500 font-medium text-white leading-5 hover:bg-slate-600 md:mx-0 md:w-auto"
                                href="{{ route('register') }}">Daftar Gratis</a>
                        @endif
                    </div>

                    <!-- Search input on mobile screen -->
                    <div class="mt-3 md:hidden">
                        <input type="text"
                            class="w-full px-4 py-3 leading-tight text-sm  bg-gray-100 rounded-md placeholder-gray-500 focus:outline-none focus:bg-gray-800 text-white focus:shadow-outline"
                            placeholder="Search" aria-label="Search">
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main class="content bg-gray-800 text-white pt-20">
        {{ $slot }}


    </main>

    <div class="w-full relative mt-20 bottom-0">
        <footer class="bg-gray-800">
            <div class="relative py-2">
                <div class="container mx-auto px-4">
                    <hr class="my-6">
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                            <div class="text-sm text-white py-1">Copyright ?? 2021 Notus Design System PRO by
                                Creative Tim.</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Start Footer -->
    @stack('modal')
    @livewireScripts
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    {{-- <script src="{{ asset('js/owl.lazyload.js') }}"></script> --}}
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 100,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();
        document.getElementById('moar').onclick = function() {
            var section = document.createElement('section');
            section.className = 'section--purple wow fadeInDown';
            this.parentNode.insertBefore(section, this);
        };
    </script>
    <script src="{{ asset('slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('js/particles.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.slick').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true,
                fade: true,
                cssEase: 'linear',
                autoplay: true

            });
            if (document.getElementById("particles-1")) particlesJS("particles-1", {
                "particles": {
                    "number": {
                        "value": 40,
                        "density": {
                            "enable": !0,
                            "value_area": 4000
                        }
                    },
                    "color": {
                        "value": ["#FFFFFF", "#FFFFFF", "#FFFFFF"]
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#fff"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 33,
                            "height": 33
                        }
                    },
                    "opacity": {
                        "value": 0.15,
                        "random": !0,
                        "anim": {
                            "enable": !0,
                            "speed": 0.2,
                            "opacity_min": 0.15,
                            "sync": !1
                        }
                    },
                    "size": {
                        "value": 50,
                        "random": !0,
                        "anim": {
                            "enable": !0,
                            "speed": 2,
                            "size_min": 5,
                            "sync": !1
                        }
                    },
                    "line_linked": {
                        "enable": !1,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": !0,
                        "speed": 1,
                        "direction": "top",
                        "random": !0,
                        "straight": !1,
                        "out_mode": "out",
                        "bounce": !1,
                        "attract": {
                            "enable": !1,
                            "rotateX": 600,
                            "rotateY": 600
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": !1,
                            "mode": "bubble"
                        },
                        "onclick": {
                            "enable": !1,
                            "mode": "repulse"
                        },
                        "resize": !0
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1,
                            }
                        },
                        "bubble": {
                            "distance": 250,
                            "size": 0,
                            "duration": 2,
                            "opacity": 0,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 400,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": !0
            });

            if (document.getElementById("particles-2")) particlesJS("particles-2", {
                "particles": {
                    "number": {
                        "value": 40,
                        "density": {
                            "enable": !0,
                            "value_area": 4000
                        }
                    },
                    "color": {
                        "value": ["#FFFFFF", "#FFFFFF", "#FFFFFF"]
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#fff"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                        "image": {
                            "src": "img/github.svg",
                            "width": 33,
                            "height": 33
                        }
                    },
                    "opacity": {
                        "value": 0.15,
                        "random": !0,
                        "anim": {
                            "enable": !0,
                            "speed": 0.2,
                            "opacity_min": 0.15,
                            "sync": !1
                        }
                    },
                    "size": {
                        "value": 50,
                        "random": !0,
                        "anim": {
                            "enable": !0,
                            "speed": 2,
                            "size_min": 5,
                            "sync": !1
                        }
                    },
                    "line_linked": {
                        "enable": !1,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": !0,
                        "speed": 1,
                        "direction": "top",
                        "random": !0,
                        "straight": !1,
                        "out_mode": "out",
                        "bounce": !1,
                        "attract": {
                            "enable": !1,
                            "rotateX": 600,
                            "rotateY": 600
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": !1,
                            "mode": "bubble"
                        },
                        "onclick": {
                            "enable": !1,
                            "mode": "repulse"
                        },
                        "resize": !0
                    },
                    "modes": {
                        "grab": {
                            "distance": 400,
                            "line_linked": {
                                "opacity": 1,
                            }
                        },
                        "bubble": {
                            "distance": 250,
                            "size": 0,
                            "duration": 2,
                            "opacity": 0,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 400,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": !0
            });
        });
    </script>
</body>

</html>
