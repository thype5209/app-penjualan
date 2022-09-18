<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="{{ asset('@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('js/sweetalert.all.js') }}"></script>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-blue-darken">

    <noscript>You need to enable JavaScript to run this app.</noscript>
    @include('sweetalert::alert')
    <div id="root">
        <nav x-data="{ Dropdown: false }"
            class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
            <div
                class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
                <button
                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                    type="button" onclick="toggleNavbar('example-collapse-sidebar')">
                    <i class="fas fa-bars"></i>
                </button>
                <a class="md:block text-left md:pb-2 text-gray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                    href="{{ route('Admin.Dashboard-Admin') }}">
                    Selamat Datang {{ Auth::user()->name }}
                </a>
                <ul class="md:hidden items-center flex flex-wrap list-none">
                    <li class="inline-block relative">
                        <a class="text-gray-500 block py-1 px-3" href="#pablo" x-on:click="Dropdown = ! Dropdown"><i
                                class="fas fa-bell"></i></a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="notification-dropdown" x-show="Dropdown">
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Action</a><a
                                href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Another
                                action</a><a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Something
                                else here</a>
                            <div class="h-0 my-2 border border-solid border-gray-100"></div>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Seprated
                                link</a>
                        </div>
                    </li>
                    <li class="inline-block relative">
                        <a class="text-gray-500 block" href="#pablo" x-on:click="Dropdown = ! Dropdown">
                            <div class="items-center flex">
                                <span
                                    class="w-12 h-12 text-sm text-white bg-gray-200 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="{{ Auth::user()->profile_photo_url }}" /></span>
                            </div>
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="user-responsive-dropdown" x-show="Dropdown">
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Action</a><a
                                href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Another
                                action</a><a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Something
                                else here</a>
                            <div class="h-0 my-2 border border-solid border-gray-100"></div>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Seprated
                                link</a>
                        </div>
                    </li>
                </ul>
                <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                    id="example-collapse-sidebar">
                    <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-gray-200">
                        <div class="flex flex-wrap">
                            <div class="w-6/12">
                                <a class="md:block text-left md:pb-2 text-gray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                    href="/">
                                    IrsanJaya
                                </a>
                            </div>
                            <div class="w-6/12 flex justify-end">
                                <button type="button"
                                    class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                    onclick="toggleNavbar('example-collapse-sidebar')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form class="mt-6 mb-4 md:hidden">
                        <div class="mb-3 pt-0">
                            <input type="text" placeholder="Search"
                                class="border-0 px-3 py-2 h-12 border border-solid border-gray-500 placeholder-gray-300 text-gray-600 bg-white rounded text-base leading-snug shadow-none outline-none focus:outline-none w-full font-normal" />
                        </div>
                    </form>
                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Navigation -->

                    <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                        <li class="items-center  ">
                            <a href="{{ route('Admin.Dashboard-Admin') }}"
                                class="text-xs uppercase py-3 font-bold block {{request()->routeIs('Admin.Dashboard-Admin') ? ' bg-blue-darken text-white' :'text-gray-700 hover:text-gray-500'}}">
                                <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="items-center" x-data="{Master : false}">
                            <a href="#" @click="Master =! Master"
                                class="text-xs uppercase py-3 font-bold block {{request()->routeIs('Admin.Page-Barang') || request()->routeIs('Admin.Page-Promo') || request()->routeIs('Admin.Page-Voucher') ? ' bg-blue-darken text-white' :'text-gray-700 hover:text-gray-500'}}">
                                <i class=" mr-2 text-sm text-gray-300"></i>
                                Master Barang
                            </a>
                            <ul class="md:flex-col md:min-w-full flex flex-col list-none bg-blue-darken" x-show="Master" x-transition>
                                <li class="items-center">
                                    <a href="{{ route('Admin.Page-Barang') }}"
                                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                                        Kelola Barang
                                    </a>
                                </li>
                                <li class="items-center">
                                    <a href="{{ route('Admin.Page-Promo') }}"
                                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                                        Promo
                                    </a>
                                </li>
                                <li class="items-center">
                                    <a href="{{ route('Admin.Page-Voucher') }}"
                                        class="text-xs uppercase py-3 px-3 font-bold block text-white hover:text-white">
                                        Voucher
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="items-center">
                            <a href="{{ route('Admin.Page-Penjualan') }}"
                                class="text-xs uppercase py-3 font-bold block {{request()->routeIs('Admin.Page-Penjualan') ? ' bg-blue-darken text-white' :'text-gray-700 hover:text-gray-500'}}">
                                <i class=" mr-2 text-sm text-gray-300"></i>
                                Penjualan
                            </a>
                        </li>


                        <li class="items-center">
                            <a href="{{ route('Admin.Laporan') }}"
                                class="text-xs uppercase py-3 font-bold block {{request()->routeIs('Admin.Laporan') ? ' bg-blue-darken text-white' :'text-gray-700 hover:text-gray-500'}}">
                                <i class=" mr-2 text-sm text-gray-300"></i>
                                Laporan
                            </a>
                        </li>
                    </ul>

                    <!-- Divider -->
                    <hr class="my-4 md:min-w-full" />
                    <!-- Heading -->
                    <h6 class="md:min-w-full text-gray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                        Auth Layout Pages
                    </h6>
                    <!-- Navigation -->

                    <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                        <li class="items-center">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type='submit'
                                    class=" text-gray-700 hover:text-gray-500 text-xs uppercase py-3 font-bold block">
                                    <i class="fas fa-fingerprint text-gray-300 mr-2 text-sm"></i>
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="relative md:ml-64 bg-transparent">
            <nav
                class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4 shadow-sm shadow-white">
                <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                    {{-- <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                        href="#">IrsanJaya</a> --}}
                    <form class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3">
                        <div class="relative flex w-full flex-wrap items-stretch">
                            <span
                                class="z-10 h-full leading-snug font-normal absolute text-center text-gray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"><i
                                    class="fas fa-search"></i></span>
                            <input type="text" placeholder="Search here..."
                                class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10" />
                        </div>
                    </form>
                    <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
                        <a class="text-gray-500 block" href="#" x-on:click="Dropdown = ! Dropdown">
                            <div class="items-center flex">
                                <span x-text="Dropdown"
                                    class="w-12 h-12 text-sm text-white bg-gray-200 inline-flex items-center justify-center rounded-full"><img
                                        alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                                        src="{{ Auth::user()->profile_photo_url }}" /> </span>
                            </div>
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="user-dropdown" x-show="Dropdown">
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Action</a><a
                                href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Another
                                action</a><a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Something
                                else here</a>
                            <div class="h-0 my-2 border border-solid border-gray-100"></div>
                            <a href="#pablo"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700">Seprated
                                link</a>
                        </div>
                    </ul>
                </div>
            </nav>
            <!-- Header -->
            <div class="relative  pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>

    @stack('modals')

    @livewireScripts


    <footer class="block py-4 absolute bottom-0 right-0 w-full bg-white">
        <div class="container mx-auto px-4">
            <hr class="mb-4 border-b-1 border-gray-200" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4">
                    <div class="text-sm text-gray-500 font-semibold py-1 text-center md:text-left">
                        Copyright © <span id="get-current-year"></span>
                        <a href="https://www.creative-tim.com?ref=njs-dashboard"
                            class="text-gray-500 hover:text-gray-700 text-sm font-semibold py-1">
                            Creative Tim
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-8/12 px-4">
                    <ul class="flex flex-wrap list-none md:justify-end justify-center">
                        {{-- <li>
                            <a href="https://www.creative-tim.com?ref=njs-dashboard"
                                class="text-gray-600 hover:text-gray-800 text-sm font-semibold block py-1 px-3">
                                Creative Tim
                            </a>
                        </li> --}}
                        <li>
                            <a href="https://www.creative-tim.com/presentation?ref=njs-dashboard"
                                class="text-gray-600 hover:text-gray-800 text-sm font-semibold block py-1 px-3">
                                Tentang Kmai
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com?ref=njs-dashboard"
                                class="text-gray-600 hover:text-gray-800 text-sm font-semibold block py-1 px-3">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-dashboard"
                                class="text-gray-600 hover:text-gray-800 text-sm font-semibold block py-1 px-3">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
