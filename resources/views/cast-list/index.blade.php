<x-app-layout>
    <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
         キャスト管理ページ
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
              @if (session('status'))
                  <div class="mb-4 font-bold text-sm text-brown-400 bg-white text-center rounded-lg mx-auto w-2/3 lg:w-1/3">
                      {{ session('status') }}
                  </div>
              @endif

              @if ($casts->isEmpty())
              <div class="bg-gray-200 rounded-lg text-center font-bold w-2/3 lg:w-1/3 mx-auto">
                キャストが登録されていません。
              </div>
              @else
                <table class="table-auto w-4/5 lg:w-full text-left whitespace-no-wrap mx-auto">
                  <thead>
                    <tr>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">ID</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">名前</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">種類</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">性別</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">年齢</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">性格</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">メイン画像</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">サブ画像</th>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">詳細</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ( $casts as $cast )
                      <tr>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $cast->id }}</td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $cast->cast_name }}</td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $cast->types }}</td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                            @if ($cast->gender === 1)
                                ♂
                            @else
                                ♀
                            @endif
                        </td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $cast->age }} 歳</td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ Str::limit($cast->character, 20) }}</td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                          @empty($cast->main_image_path)
                            なし
                          @else
                            <img class="h-12" src="{{ asset('storage/' . $cast->main_image_path )}}" alt="mainprev">
                          @endempty
                        </td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                            @empty($cast->sub_image_path)
                              なし
                            @else
                              <img class="h-12" src="{{ asset('storage/' . $cast->sub_image_path )}}" alt="subprev">
                            @endempty
                          </td>
                        <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                          {{-- <x-primary-button><a class="" href="{{ route('owner.blog.show', ['id' => $blog->id]) }}">詳細を見る</a></x-primary-button> --}}
                          <x-primary-button><a class="">詳細を見る</a></x-primary-button>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              @endif
            </div>
            {{ $casts->links() }}
        </div>
        <div class="text-center my-10">
          <x-primary-button>
            <a class="text-base" href="{{ route('owner.cast-list.create') }}">登録する</a>
          </x-primary-button>
        </div>
    </div>
</x-app-layout>