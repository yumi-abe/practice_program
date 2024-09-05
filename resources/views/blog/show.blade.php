<x-home-layout>

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
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">タイトル</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">内容</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->created_at }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->title }}</td>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $blog->content }}</td> 
                      </td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>

    
</x-home-layout>
