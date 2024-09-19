    <x-home-layout>

    <!-- メインビジュアル -->
    <div>
      <img
      src="{{asset('img/grid5.jpg')}}"
      alt="main"
      class="object-cover h-fit w-full "
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
    
    <!-- price -->
    <section id="price" class="bg-body py-10">
      <x-price-section />
    </section>

    <!-- access -->
    <section id="access" class="bg-pastel-pink py-10">
      <div class="text-center">
        <h2 class="text-2xl font-bold text-brown-500 ml- mb-7">ACCESS</h2>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="{{ asset('img/accessimg1x.png') }}" alt="accessImage">
        <div class="ml-2">
          <p>〒155-0031 東京都世田谷区北沢２丁目１０</p>
          <p>下北沢駅より徒歩2分</p>
          <p><a href="tel:+8131234-5678">03-1234-5678</a></p>
          <x-primary-button>
            <a href="https://goo.gl/maps/EmkYveF2nM8KhRkZ7" target="_blank">google map</a>
          </x-primary-button>
        </div>
      </div>
    </section>



  </x-home-layout>
</html>