<x-home-layout>
    <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
        お知らせ一覧
   </h2>

   <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
        @foreach ( $blogs as $blog )
        <div class="p-4 md:w-1/3">
        <a href="{{ route('user.news.show', ['id' => $blog->id]) }}">
          <div class="h-full bg-white hover:bg-gray-200 border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog">
            <div class="p-6 flex flex-col">
              <h2 class="tracking-widest text-xl title-font font-bold text-brown-500 mb-1">{{ $blog->title }}</h2>
              <p class="leading-relaxed mb-3">{{ Str::limit($blog->content, 100) }}</p>
              <div class="">
                {{-- <x-primary-button>
                <a href="{{ route('user.news.show', ['id' => $blog->id]) }}">続きを読む</a>
                </x-primary-button> --}}
              </div>
            </div>
          </div>
        </a>
        </div>
      
        @endforeach
      </div>
    </div>
  </section>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
          <div class="container mx-auto w-4/5 lg:w-full">
             <div class="header flex bg-gray-300 text-gray-900 text-sm font-medium">
               <div class="w-1/4 px-4 py-3">投稿日</div>
               <div class="w-1/4 px-4 py-3">タイトル</div>
               <div class="w-1/4 px-4 py-3">内容</div>
               <div class="w-1/4 px-4 py-3">詳細</div>
             </div>
             
             @foreach ($blogs as $blog)
             <div>
                 
             </div>
             <a href="{{ route('owner.blog.show', ['id' => $blog->id]) }}" class="row flex bg-gray-100 hover:bg-gray-200 text-gray-900 text-sm border-t border-b border-body">
               <div class="w-1/4 px-4 py-3">{{ $blog->created_at }}</div>
               <div class="w-1/4 px-4 py-3">{{ $blog->title }}</div>
               <div class="w-1/4 px-4 py-3">{{ $blog->content }}</div>
               <div class="w-1/4 px-4 py-3">詳細を見る</div>
             </a>
             @endforeach
          </div>
          
        </div>
        {{ $blogs->links() }}
    </div>
 </div>
 
</x-home-layout>