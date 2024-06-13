<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             予約履歴 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                          <thead>
                            <tr>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">予約日</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">プラン</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">キャスト</th>
                              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $reserveForms as $reserveForm )
                            <tr>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $reserveForm->id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $reserveForm->name }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">{{ $reserveForm->formated_date }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $reserveForm->planCategory->plan_name }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">{{ $reserveForm->CastCategory->cast_name }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900"><a class="text-blue-500" href="{{ route('forms.show', ['id' => $reserveForm->id]) }}">詳細を見る</a></td>
                                  </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                      </div>
                </div>
                <a href="{{ route('forms.create') }}" class="text-blue-500">新規登録</a>
            </div>
        </div>
    </div>
</x-app-layout>
