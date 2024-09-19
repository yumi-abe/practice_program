    <x-home-layout>

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
      <x-news-section :blogs="$blogs" />
    </section>

    <!-- cast -->
    <section id="cast" class="bg-pastel-pink py-10">
      <x-cast-intoroduction />
    </section>
    

    {{-- </main> --}}

    {{-- <script src="{{ asset('js/test.js') }}"></script> --}}

  </x-home-layout>
</html>