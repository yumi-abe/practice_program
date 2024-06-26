    <x-test-layout>
    <!-- メインビジュアル -->
    <div>
      <img
      src="{{asset('img/mainvisual011x.jpg')}}"
      alt="main"
      class="object-cover h-96 w-full "
      />
    </div>
    <!-- concept -->
    <section id="concept" class="text-center bg-pastel-pink py-10">
      <h2 class="text-2xl font-bold text-brown mb-7"><img class="mx-auto" src="{{ asset('img/concept1x.png') }}" alt="concept"></h2>
      <p>
          Cat Cafeもふもふは
          <br>一人、カップル、友達同士、ご家族など
          <br>様々な方が楽しめる場所です。
          <br>キャスト（猫）に癒されて、
          <br>ゆったりとしたひとときを、
          <br>お過ごしください。
      </p>
    </section>
    <!-- news -->
    <section id="news" class="bg-body py-10">
      <h2 class="text-2xl font-bold text-white ml- mb-7"><img class="mx-auto" src="{{ asset('img/news1x.png') }}" alt="news"></h2>
      <div class="flex justify-around">
        <div>
          <a href="#">
            <img class="rounded-lg" src="{{ asset('img/newsitem011x.jpg') }}" alt="GWの営業時間について">
          </a>
          <p>
            <time datetime="2023-04-01">2023.4.01</time>
            <br>GWの営業時間について
          </p>
        </div>
        <div>
          <a href="#">
            <img class="rounded-lg"  src="{{ asset('img/newsitem021x.jpg') }}" alt="新入りキャスト紹介">
          </a>
          <p>
            <time datetime="2023-03-15">2023.3.15</time>
            <br>新入りキャスト紹介
          </p>
        </div>
        <div>
          <a href="#">
            <img class="rounded-lg"  src="{{ asset('img/newsitem031x.jpg') }}" alt="お得な月間パスのご案内">
          </a>
          <p>
            <time datetime="2023-03-15">2023.2.1</time>
            <br>お得な月間パスのご案内
          </p>
        </div>
      </div>
      <div class="text-center mt-6">
        <a href="#">
          <button type="button" class="text-2xl text-white bg-brown rounded-lg py-3 px-5">more</button>
        </a>
      </div>
    </section>
    

    {{-- </main> --}}

    {{-- <script src="{{ asset('js/test.js') }}"></script> --}}

  </x-test-layout>
</html>