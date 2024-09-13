<x-app-layout>
    @push('custom-js')
        <script src="{{ asset('/js/confirm-message.js') }}"></script>
    @endpush

    <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
        予約詳細ページ
   </h2>
   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">               
          <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
              <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->formated_date }} {{ $reserve->formated_startTime }}～{{ $reserve->formated_endDate }}</td>
              </tr>
            </tbody>
            <thead>
              <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->planCategory->plan_name }}</td>
              </tr>
            </tbody>
            <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->CastCategory->cast_name }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約者名</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->name }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">メールアドレス</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->email }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">電話番号</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserve->user->phone }}</td>
                </tr>
            </tbody>
            <thead>
              <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">備考</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{!! nl2br(e($reserve->message)) !!}</td> 
              </tr>
            </tbody>
            
          </table>
        </div>
        <div class="flex flex-col items-center gap-4 my-10">
          <div class="flex items-center gap-6">
            {{-- <form method="get" action="{{ route('owner.blog.edit', ['id' => $blog->id]) }}">
              <button class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-base font-bold">編集する</button>
            </form> --}}
            <form id="delete_{{ $reserve->id }}" method="post" action="{{ route('owner.reserve-list.destroy', ['id' => $reserve->id ])}}">
              @csrf
              @method('delete')
              <a data-id="{{ $reserve->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-base font-bold">キャンセルする</a>
            </form>
          </div>
          <a class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-base font-bold" href="{{ route('owner.reserve-list.index') }}">
            戻る
          </a>
        </div>
        </div>
    </div>
</x-app-layout>