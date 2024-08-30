<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
             ご予約一覧 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
              @if (session('status'))
                  <div class="mb-4 font-medium text-sm text-green-600 text-center">
                      {{ session('status') }}
                  </div>
              @endif
                {{-- <div class="p-6 text-gray-900"> --}}
                  @if($reserveForms->isEmpty())
                  <div class="bg-gray-200 rounded-lg text-center font-bold w-2/3 lg:w-1/3 mx-auto">
                    <p>予約がありません</p>
                  </div>
                    @else
                    <div class="hidden md:block lg:w-2/3 w-full mx-auto overflow-auto ">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300 rounded-tl rounded-bl">ID</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">名前</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日時</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300 rounded-tr rounded-br">詳細</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ( $reserveForms as $reserveForm )
                              <tr>
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3 rounded-tl rounded-bl">{{ $reserveForm->id }}</td>
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->name }}</td>
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->formated_startDate }}～{{ $reserveForm->formated_endDate }}</td>
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->planCategory->plan_name }}</td>
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->CastCategory->cast_name }}</td> 
                                <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3 rounded-tr rounded-br">
                                  <x-primary-button><a class="" href="{{ route('user.booking.show', ['id' => $reserveForm->id]) }}">詳細を見る</a></x-primary-button>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                        {{ $reserveForms->appends(['past_page' => request('past_page')])->links() }}
                      @endif
                    </div>
                {{-- </div> --}}


                <!-- レスポンシブ予約一覧 -->
                @foreach ( $reserveForms as $reserveForm )

                <table class="md:hidden flex justify-center mb-4">
                  <tbody>
                    {{-- <tr>
                      <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">名前</th>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->name }} 様</td>
                    </tr> --}}
                    <tr>
                      <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日時</th>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{$reserveForm->formated_Date}}<Br>{{ $reserveForm->formated_startTime }}～{{ $reserveForm->formated_endDate }}</td>
                    </tr>
                    <tr>
                      <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->planCategory->plan_name }}</td>
                    </tr>
                    <tr>
                      <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->CastCategory->cast_name }}</td>
                    </tr>
                    <tr>
                      <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約詳細</th>
                      <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                        <x-primary-button><a class="" href="{{ route('user.booking.show', ['id' => $reserveForm->id]) }}">詳細を見る</a></x-primary-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                @endforeach
                <!-- /レスポンシブ予約一覧 -->

                <div class="text-center mt-5 mb-14">
                  {{-- <a href="{{ route('user.forms.create') }}" class="px-4 py-2 bg-brown-400 text-white rounded-md hover:bg-brown-200">新規予約</a> --}}
                  <x-primary-button>
                    <a class="text-sm" href="{{ route('user.booking.create') }}">新規ご予約</a>
                  </x-primary-button>
                </div>

                  <h3 class="font-semibold text-xl text-white leading-tight text-center mb-2">
                    過去のご予約一覧 
                  </h3>
                  @if ($pastReserveForms->isEmpty())
                    <div class="bg-gray-200 rounded-lg text-center font-bold w-2/3 lg:w-1/3 mx-auto">
                      <p>過去の予約がありません</p>
                    </div>
                  @else
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto text-gray-900">
                    <table class="hidden md:block table-auto w-full text-left whitespace-no-wrap">
                      <thead>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300 rounded-tl rounded-bl">ID</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">名前</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日時</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300 rounded-tr rounded-br">詳細</th>
                      </thead>
                      <tbody>
                        @foreach ( $pastReserveForms as $pastReserveForm )
                        <tr>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3 rounded-tl rounded-bl">{{ $pastReserveForm->id }}</td>
                            <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->name }}</td>
                            <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->formated_startDate }}～{{ $pastReserveForm->formated_endDate }}</td>
                            <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->planCategory->plan_name }}</td>
                            <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->CastCategory->cast_name }}</td> 
                            <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3 rounded-tr rounded-br">
                              <x-primary-button><a class="" href="{{ route('user.booking.show', ['id' => $pastReserveForm->id]) }}">詳細を見る</a></x-primary-button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- レスポンシブ過去予約一覧 -->
                    @foreach ( $pastReserveForms as $pastReserveForm )

                    <table class="md:hidden flex justify-center mb-4">
                      <tbody>
                        {{-- <tr>
                          <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">名前</th>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $reserveForm->name }} 様</td>
                        </tr> --}}
                        <tr>
                          <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約日時</th>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{$pastReserveForm->formated_Date}}<Br>{{ $pastReserveForm->formated_startTime }}～{{ $pastReserveForm->formated_endDate }}</td>
                        </tr>
                        <tr>
                          <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">プラン</th>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->planCategory->plan_name }}</td>
                        </tr>
                        <tr>
                          <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">キャスト</th>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">{{ $pastReserveForm->CastCategory->cast_name }}</td>
                        </tr>
                        <tr>
                          <th class="px-4 py-3 border-t-2 border-body border-b-2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-300">予約詳細</th>
                          <td class="border-t-2 border-body border-b-2 bg-gray-100 px-4 py-3">
                            <x-primary-button><a class="" href="{{ route('user.booking.show', ['id' => $pastReserveForm->id]) }}">詳細を見る</a></x-primary-button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    @endforeach
                    <!-- /レスポンシブ予約一覧 -->
                    {{ $pastReserveForms->appends(['page' => request('page')])->links() }}
                    
                  </div>
                  @endif
                {{-- <x-primary-button>
                  <a href="{{ route('user.forms.create') }}">お問い合わせ</a>
                </x-primary-button> --}}
            </div>
        </div>
    </div>

    
</x-app-layout>
