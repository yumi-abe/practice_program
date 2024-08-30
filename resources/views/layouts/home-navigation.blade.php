    {{-- <header class="py-6 bg-brown-500 text-white font-bold tracking-wide"> --}}
    <header class="bg-brown-500 text-white shadow flex justify-around items-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto flex justify-between items-center px-8 md:px-8 lg:px-8 w-full">

          <h1 class="text-2xl text-center">
            <a href="/">Catcafe <br> mofumofu</a> 
        </h1>
          <ul class="text-xl space-x-5 hidden md:flex items-center">
            <li><a href="#news" class="hover:text-body transition-all duration-300">news</a></li>
            <li><a href="#cast" class="hover:text-body transition-all duration-300">cast</a></li>
            <li><a href="#price" class="hover:text-body transition-all duration-300">price</a></li>
            <li><a href="#access" class="hover:text-body transition-all duration-300">access</a></li>
            <li><a href="{{ url('/login') }}">
              <button class="px-6 py-2 ml-4 bg-body rounded-lg hover:bg-pastel-pink hover:text-gray-600 transition-all duration-300">reserve</button>
            </a></li>
          </ul>
          <!-- ハンバーガーメニュー -->
          {{-- <nav> --}}
    <nav class="md:hidden">

            {{-- <button id="button" type="button" class="absolute z-10 top-8 right-10 md:hidden"> --}}
        <button id="button" type="button" class="flex items-center justify-end">

              <div id="bars">
                <i class="fa-solid fa-paw fa-2x py-3 px-4 bg-black rounded-full"></i>
              </div>
              <div id="xmark" class="hidden mt-2 mr-4 z-10">
                <i class="fa-solid fa-xmark fa-2x"></i>
              </div>
            </button>
            <ul id="menu" class="z-0 fixed top-0 left-0 w-full py-20 text-center bg-body translate-x-full transition ease-linear h-full">
              <li><a href="{{ url('/') }}" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">news</a></li>
              <li><a href="#cast" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">cast</a></li>
              <li><a href="price" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">price</a></li>
              <li><a href="#access" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">access</a></li>
              <li><a href="{{ url('/login') }}"  class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">reserve</a></li>
            </ul>
          </nav>
      </header>
    {{-- <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('forms.index')" :active="request()->routeIs('forms.index')">
                        {{ __('予約一覧') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('forms.index')" :active="request()->routeIs('forms.index')">
                予約一覧
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}
