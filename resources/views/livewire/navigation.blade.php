<header class="bg-neutral-700 sticky top-0" style="z-index: 10000" x-data="dropdown()">
    <div class="container flex items-center justify-between md:justify-start h-16">
        <!-- Categorias button -->
        <a href="#" :class="{ 'bg-opacity-100 text-orange-500': open }" x-on:click="show()"
            class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full ">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span class="text-sm hidden md:block">Categorias</span>
        </a>
        <!-- Logo -->
        <a href="/" class="mx-6">
            <x-application-mark class="block h-9" />
        </a>
        <!-- Search Bar -->
        <div class="flex-1 hidden md:block">
            @livewire('search')
        </div>
        <!-- Settings Dropdown -->
        <div class="mx-6 relative hidden md:block">
            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Orders -->
                        <x-dropdown-link href="{{ route('orders.index') }}">
                            {{ __('Orders') }}
                        </x-dropdown-link>
                        
                        <!-- Admin -->
                        <x-dropdown-link href="{{ route('admin.index') }}">
                            {{ __('Administrador') }}
                        </x-dropdown-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fa-solid fa-circle-user text-white text-3xl cursor-pointer"></i>
                    </x-slot>
                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Guest') }}
                        </div>
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>
        <!-- Carrito de Compras -->
        <div class="hidden md:block">
            @livewire('dropdown-cart')
        </div>

    </div>
    <nav id="navigation-menu" x-cloak x-show="open" class="bg-neutral-700 bg-opacity-25 absolute w-full">
        <!-- Menu Desktop -->
        <div class="container h-full hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class="navigation-link text-neutral-500 hover:bg-orange-500 hover:text-white">
                            <a href="{{ route('categories.show', $category) }}"
                                class="py-2 px-4 text-sm flex items-center">
                                <span class="flex justify-center w-9">
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>
                            <div class="navigation-submenu absolute top-0 right-0 w-3/4 h-full bg-gray-100 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-gray-100">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
        <!-- Menu Mobil -->
        <div class="bg-white h-f overflow-y-auto md:hidden">
            <!-- Search Bar -->
            <div class="container bg-gray-200 py-3">
                @livewire('search')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class="text-neutral-500 hover:bg-orange-500 hover:text-white">
                        <a href="{{ route('categories.show', $category) }}"
                            class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <p class=" text-neutral-500 px-6 my-2 ">USUARIOS</p>
            @livewire('cart-mobil')
            @auth
                <a href="{{ route('profile.show') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-address-card"></i>
                    </span>
                    Perfil
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="py-2 px-4 text-sm flex items-center w-full text-neutral-500 hover:bg-orange-500 hover:text-white">
                        <span class="flex justify-center w-9">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        Cerrar Sesion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-circle-user"></i>
                    </span>
                    Iniciar Sesion
                </a>
                <a href="{{ route('register') }}"
                    class="py-2 px-4 text-sm flex items-center text-neutral-500 hover:bg-orange-500 hover:text-white">
                    <span class="flex justify-center w-9">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>
                    Registrarse
                </a>
            @endauth
        </div>
    </nav>


</header>
