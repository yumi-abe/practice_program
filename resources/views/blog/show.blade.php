<x-app-layout>
  @push('custom-js')
  <script src="{{ asset('/js/previmage.js') }}"></script>
  <script src="{{ asset('/js/confirm-message.js') }}"></script>
@endpush
        <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
             詳細
        </h2>

        <div class="text-right max-w-7xl mr-6">
          <x-primary-button>
            <a class="text-base" href="{{ route('user.news.show', ['id' => $blog->id]) }}">閲覧ページへ</a>
          </x-primary-button>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">               
              <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">投稿日</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->created_at }}</td>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">タイトル</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->title }}</td>
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">内容</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{!! nl2br(e($blog->content)) !!}</td> 
                  </tr>
                </tbody>
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">添付画像</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @if (!empty($blog->image_path))
                    <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                      <img class="w-40" src="{{ asset('storage/' . $blog->image_path )}}" alt="blog">
                    </td> 
                    @else
                    <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">添付されていません</td> 
                    @endif
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="flex flex-col items-center gap-4 my-10">
              <div class="flex items-center gap-6">
                <form method="get" action="{{ route('owner.blog.edit', ['id' => $blog->id]) }}">
                  <button class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-base font-bold">編集する</button>
                </form>
                <form id="delete_{{ $blog->id }}" method="post" action="{{ route('owner.blog.destroy', ['id' => $blog->id ])}}">
                  @csrf
                  @method('DELETE')
                  <a href="#" data-id="{{ $blog->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-base font-bold">削除する</a>
                </form>
              </div>
              <a class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-base font-bold" href="{{ route('owner.blog.index') }}">
                戻る
              </a>
            </div>
        </div>
    </div>
</x-home-layout>
