    {{-- <header class="py-6 bg-brown-500 text-white font-bold tracking-wide"> --}}
    <header class="bg-brown-500 text-white shadow flex justify-around items-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto flex justify-between items-center px-8 md:px-8 lg:px-8 w-full">

          <h1 class="text-2xl text-center">
            <a href="/">Catcafe <br> mofumofu</a> 
        </h1>
          <ul class="text-xl space-x-5 hidden md:flex items-center">
            <li><a href="{{ url('/#news') }}" class="hover:text-body transition-all duration-300">news</a></li>
            <li><a href="{{ url('/#cast') }}" class="hover:text-body transition-all duration-300">cast</a></li>
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