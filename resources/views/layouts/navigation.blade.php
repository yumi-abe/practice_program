<!-- Page Heading -->
@if (isset($header))
{{-- <header class="bg-brown-500 shadow flex justify-around "> --}}
    <header class="bg-brown-500 shadow flex justify-around items-center py-6 px-4 sm:px-6 lg:px-8">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        {{ $header }}
    </div>
    {{-- マイページタブ --}}
    <!-- Settings Dropdown -->
    <div class="hidden md:flex sm:items-center ">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-pastel-pink hover:bg-white focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                
                @if (request()->routeIs('user.profile.edit'))
                <x-dropdown-link :href="route('user.booking.index')">
                    ご予約一覧
                </x-dropdown-link>
                @else
                <x-dropdown-link :href="route('user.profile.edit')">
                    ユーザー情報
                </x-dropdown-link>
                @endif
                <x-dropdown-link :href="url('/')">
                    ホームページへ
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('user.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
    <!-- ハンバーガーメニュー -->
    <nav class="md:hidden z-10">
        {{-- <button id="button" type="button" class="absolute z-10 top-3 right-6 md:hidden"> --}}
        <button id="button" type="button" class="flex items-center justify-end">
          <div id="bars">
            {{-- <i class="fa-solid fa-paw fa-2x py-3 px-4 bg-black rounded-full"></i> --}}
            <i class="fa fa-paw fa-2x py-3 px-4 text-white bg-black rounded-full" aria-hidden="true"></i>
          </div>
          <div id="xmark" class="hidden mt-2 mr-4 z-10">
            <i class="fa-solid fa-xmark fa-2x text-white"></i>
          </div>
        </button>
        <ul id="menu" class="z-0 fixed top-0 left-0 w-full py-20 text-center bg-body translate-x-full transition ease-linear h-full text-white">
            @if (request()->routeIs('user.profile.edit'))
          <li><a href="{{ url('/booking') }}" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">ご予約一覧</a></li>
            @else
          <li><a href="{{ url('/profile') }}" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">ユーザー情報</a></li>
            @endif
          <li><a href="{{ url('/') }}" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">ホームページへ</a></li>
          <li>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="block py-2 px-4 text-lg w-full text-center hover:bg-gray-200 transition-all duration-500">
                    ログアウト
                </button>
            </form>
        </li>
        </ul>
      </nav>

</header>
@endif