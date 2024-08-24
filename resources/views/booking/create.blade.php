<x-app-layout>

    @push('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
    @endpush

    @push('custom-js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <script src="{{ asset('/js/calendar.js') }}"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
             新規ご予約
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4" :messages="$errors->all()"/>
                    <section class="text-gray-600 body-font relative">

                        @if (session('error'))
                            <div class="mb-4 font-medium text-sm text-red-600 text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    {{-- 問い合わせフォーム --}}
                        <form method="post" action="{{ route('user.booking.store') }}">
                            @csrf
                            <div class="container px-5 mx-auto">
                            <div class="lg:w-2/3 md:w-3/4 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $users[0]->name) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $users[0]->name }}">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $users[0]->email) }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $users[0]->email }}">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <div>
                                        <label for="plan_category" class="leading-7 text-sm text-gray-600">プラン選択</label>
                                    </div>
                                    {{-- データベースより値を持ってくる --}}
                                    <select name="plan_category" id="planCategory">
                                        <option value="">選択してください</option>
                                        {{-- <option value="1">30分コース</option>
                                        <option value="2">60分コース</option>
                                        <option value="3">フリータイム</option> --}}
                                        @foreach ($plans as $id => $name)
                                            <option value='{{ $id }}' {{old('plan_category') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <div>
                                        <label for="cast_category" class="leading-7 text-sm text-gray-600">キャスト選択</label>
                                    </div>
                                    <select name="cast_category" id="castCategory">
                                        <option value="">選択してください</option>
                                        {{-- <option value="1" {{old('cast_category') == '1' ? 'selected' : '' }}>あんこ</option>
                                        <option value="2">おもち</option>
                                        <option value="3">フリータイム</option> --}}
                                        @foreach ($casts as $id => $name)
                                            <option value='{{ $id }}' {{old('cast_category') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="p-2 w-full hidden" id="calendarView">
                                    <label for="date" class="leading-7 text-sm text-gray-600">予約希望日 <small>※グレーの時間帯は埋まっています。</small></label>

                                    <div class="bg-white" id='calendar'></div>

                                    <div class="flex mt-2">
                                        <div>
                                            <label for="selectedDate">選択した日付:</label>
                                            <input type="text" id="selectedDate" name="start_time" readonly>
                                        </div>
                                        <div>
                                            <label for="endDate">　終了日時　:</label>
                                            <input type="text" id="endDate" name="end_time" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="message" class="leading-7 text-sm text-gray-600">備考</label>
                                    <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full mt-4 flex justify-evenly">
                                    <a href="{{ route('user.booking.index') }}">
                                        <button type="button" class="  text-white bg-gray-400 border-0 py-2 px-16 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
                                    </a>
                                    <button type="submit" class="  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
                                </div>
                                
                            </div>
                            </div>
                        </form>
                      </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>

    

</script>
