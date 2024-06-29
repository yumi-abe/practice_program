<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                         
                    {{-- 問い合わせフォーム --}}

                            <div class="container px-5 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                                    <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="">
                                        {{ $reserve->name }}
                                    </div>
                                </div>
                                    <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                    <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="">
                                        {{ $reserve->email }}
                                    </div>
                                    <div class="relative">
                                    <div>
                                        <label for="plan_category" class="leading-7 text-sm text-gray-600">プラン選択</label>
                                    </div>
                                    {{-- データベースより値を持ってくる --}}
                                    <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="">
                                        {{ $plansId }}
                                    </div>
                                    </div>
                                    <div class="relative">
                                    <div>
                                        <label for="cast_category" class="leading-7 text-sm text-gray-600">キャスト選択</label>
                                    </div>
                                    <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="">
                                        {{ $castsId }}
                                    </div>
                                    </div>
                                    <div class="relative">
                                    <label for="date" class="leading-7 text-sm text-gray-600">予約希望日</label>
                                    <div class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        {{ $reserve->date }}
                                    </div>


                                    <div class="relative">
                                    <label for="message" class="leading-7 text-sm text-gray-600">備考</label>
                                    <div id="message" name="message" class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $reserve->message }}</div>
                                    </div>
                                    <div class="p-2 w-full mt-4 flex justify-evenly">
                                        <a href="{{ route('user.forms.index') }}">
                                            <button type="button" class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
                                        </a>
                                        <form method="get" action="{{ route('user.forms.edit', ['id' => $reserve->id]) }}">
                                            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集する</button>
                                        </form>
                                    </div>
                                    <form id="delete_{{ $reserve->id }}" class="mt-4" method="post" action="{{ route('user.forms.destroy', ['id' => $reserve->id ])}}">
                                        @csrf
                                    <div class="p-2 w-full mt-4 flex justify-evenly">
                                    <a href="#" data-id="{{ $reserve->id }}" onclick="deletePost(this)" class="flex mx-auto text-white bg-red-400 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</a>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                            </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
    {{-- 確認メッセージ --}}
    <script>
        function deletePost(e){
            'use strict'
            if(confirm('本当にキャンセルしてよろしいですか？')){
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>
</x-app-layout>
