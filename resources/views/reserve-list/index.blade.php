<x-app-layout>
    <h2 class="font-semibold text-xl text-brown-500 leading-tight text-center mt-10">
         予約一覧ページ
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @if($reserveForms->isEmpty())
                <div class="bg-gray-200 rounded-lg text-center font-bold w-2/3 lg:w-1/3 mx-auto">
                    予約は存在しません
                </div>
                @else
              <table class="table-auto w-4/5 lg:w-full text-left whitespace-no-wrap mx-auto">
                <thead>
                  <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日時</th>
                    {{-- <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th> --}}
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">備考</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約者名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">メールアドレス</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">電話番号</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $reserveForms as $reserveForm )
                    <tr>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{$reserveForm->formated_date}}<br>{{ $reserveForm->formated_startTime }}～{{ $reserveForm->formated_endDate }}</td>
                      {{-- <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->planCategory->plan_name }}</td>  --}}
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->CastCategory->cast_name }}</td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        @empty(!$reserveForm->message)
                            あり
                        @endempty

                    </td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->name }}</td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->email }}</td> 
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->user->phone }}</td> 

                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        {{-- <x-primary-button><a class="" >詳細を見る</a></x-primary-button> --}}
                        <x-primary-button><a class="" href="{{ route('owner.reserve-list.show', ['id' => $reserveForm->id]) }}">詳細を見る</a></x-primary-button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              @endif
            </div>
            {{ $reserveForms->links() }}
        </div>
        <div class="mt-20 text-center">
            <x-primary-button>
                <a class="text-base" href="{{ route('owner.reserve-list.past') }}">過去の予約一覧</a>
            </x-primary-button>
        </div>


    </div>
</x-app-layout>