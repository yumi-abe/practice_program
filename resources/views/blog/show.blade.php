<x-app-layout>

  @push('custom-css')
  <link rel="stylesheet" href="{{ asset('/css/swipe.css') }}">
  @endpush

  @push('custom-js')
  <script src="{{ asset('/js/swipe.js') }}"></script>
  @endpush
        <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
             詳細
        </h2>

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
            <div class="text-center my-10">
              <x-primary-button>
                <a class="text-base" href="{{ route('owner.blog.index') }}">戻る</a>
              </x-primary-button>
            </div>
        </div>
    </div>

    
</x-home-layout>
