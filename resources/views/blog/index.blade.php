<x-app-layout>
        <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
             ブログ管理ページ
        </h2>
        <div class="text-right max-w-7xl">
        <x-primary-button>
          <a href="{{ route('user.news.index') }}">Newsページを見る</a>
        </x-primary-button>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
              @if (session('status'))
                  <div class="mb-4 font-bold text-sm text-brown-400 bg-white text-center rounded-lg mx-auto w-2/3 lg:w-1/3">
                      {{ session('status') }}
                  </div>
              @endif
                
              <table class="table-auto w-4/5 lg:w-full text-left whitespace-no-wrap mx-auto">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">投稿日</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">タイトル</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">内容</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">添付ファイル</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">詳細</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $blogs as $blog )
                    <tr>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->created_at }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->title }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ Str::limit($blog->content, 50) }}</td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        @empty($blog->image_path)
                          なし
                        @else
                          <img class="h-12" src="{{ asset('storage/' . $blog->image_path )}}" alt="blogprev"> 
                        @endempty
                      </td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        <x-primary-button><a class="" href="{{ route('owner.blog.show', ['id' => $blog->id]) }}">詳細を見る</a></x-primary-button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            {{ $blogs->links() }}
        </div>
        <div class="text-center">
          <x-primary-button>
            <a class="text-base" href="{{ route('owner.blog.create') }}">投稿する</a>
          </x-primary-button>
        </div>
    </div>



</x-app-layout>
