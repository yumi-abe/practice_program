<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
             ご予約一覧 
        </h2>
    </x-slot>

  @push('custom-css')
  <link rel="stylesheet" href="{{ asset('/css/swipe.css') }}">
  @endpush

  @push('custom-js')
  <script src="{{ asset('/js/swipe.js') }}"></script>
  @endpush
        <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
             管理者用お知らせ一覧
        </h2>

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
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">詳細</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $blogs as $blog )
                    <tr>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->created_at }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->title }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->content }}</td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        <x-primary-button><a class="" href="{{ route('owner.blog.show', ['id' => $blog->id]) }}">詳細を見る</a></x-primary-button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>

    
</x-app-layout>
