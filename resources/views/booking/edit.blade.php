<x-app-layout>

@push('custom-css')
<link rel="stylesheet" href="{{ asset('/css/calendar.css') }}">
@endpush

@push('custom-js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
<script src="{{ asset('/js/calendar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
             ご予約内容変更
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-input-error class="mb-4 text-center" :messages="$errors->all()"/>
                    <section class="text-gray-600 body-font relative">
                    @if (session('error'))
                    <div class="mb-4 font-medium text-sm text-red-600 text-center">
                        {{ session('error') }}
                    </div>
                    @endif
                        <form method="post" action="{{ route('user.booking.update', ['id' => $reserve->id]) }}">
                            @csrf
                            @method('PATCH')
                            <div class="container px-5 mx-auto">
                                <div class="lg:w-2/3 md:w-3/4 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="name" class="leading-7 text-lg text-gray-600">お名前</label>
                                    <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $reserve->name }}">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="email" class="leading-7 text-lg text-gray-600">メールアドレス</label>
                                    <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ $reserve->email }}">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <div>
                                        <label for="plan_category" class="leading-7 text-lg text-gray-600">プラン選択</label>
                                    </div>
                                    {{-- データベースより値を持ってくる --}}
                                    <select name="plan_category" id="planCategory">
                                        {{-- <option value="">選択してください</option>
                                        <option value="1" @if($reserve->plan_category_id == 1) selected @endif>30分コース</option>
                                        <option value="2" @if($reserve->plan_category_id == 2) selected @endif>60分コース</option>
                                        <option value="3" @if($reserve->plan_category_id == 3) selected @endif>フリータイム</option> --}}
                                        @foreach ($plans as $plan)
                                            <option value='{{ $plan->id }}' @if($reserve->plan_category_id == $plan->id) selected @endif>{{ $plan->plan_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <div>
                                        <label for="cast_category" class="leading-7 text-lg text-gray-600">キャスト選択</label>
                                    </div>
                                    <select name="cast_category" id="castCategory">
                                        {{-- <option value="">選択してください</option>
                                        <option value="1" @if($reserve->cast_category_id == 1) selected @endif>あんこ</option>
                                        <option value="2" @if($reserve->cast_category_id == 2) selected @endif>おもち</option>
                                        <option value="3" @if($reserve->cast_category_id == 3) selected @endif>きなこ</option> --}}
                                    @foreach ($casts as $cast)
                                        <option value='{{ $cast->id }}' @if($reserve->cast_category_id == $cast->id) selected @endif>{{ $cast->cast_name }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                                {{-- <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="date" class="leading-7 text-sm text-gray-600">予約希望日</label>
                                    <input type="datetime-local" id="date" name="date" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{$reserve->date}}">
                                    </div>
                                </div> --}}
                                <div class="p-2 w-full" id="calendarView">
                                    <input type="hidden" id="currentStartDate" value="{{ $reserve->start_date }}">
                                    <input type="hidden" id="currentEndDate" value="{{ $reserve->end_date }}">
                                    <label for="date" class="leading-7 text-lg text-gray-600">予約希望日 <small class="text-gray-400 block sm:inline ">※グレーの時間帯は埋まっています。</small></label>
                                    <p class="text-sm  mt-2 mb-2 font-bold text-body">変更前の日時:<span class="block sm:inline">{{ $reserve->formated_startDate }}～{{ $reserve->formated_endDate }}</p>
                                    <div class="bg-white" id='calendar'></div>

                                    <div class="sm:flex mt-2">

                                        <div>
                                            <label for="selectedDate">選択した日付:</label>
                                            <input type="text" id="selectedDate" name="start_time" value="{{ $reserve->start_date }}" readonly>
                                        </div>
                                        <div class="mt-2 sm:mt-0">
                                            <label for="endDate">終了日時:</label>
                                            <input type="text" id="endDate" name="end_time" value="{{ $reserve->end_date }}" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="p-2 w-full">
                                    <div class="relative">
                                    <label for="message" class="leading-7 text-lg text-gray-600">備考</label>
                                    <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{$reserve->message}}</textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full mt-4 flex flex-col items-center gap-2 sm:flex sm:flex-row sm:justify-evenly">
                                    <a href="{{ route('user.booking.show', [$reserve->id]) }}">
                                        <button type="button" class="  text-white bg-gray-400 border-0 py-2 px-12 sm:px-14 focus:outline-none hover:bg-gray-600 rounded text-lg font-bold">戻る</button>
                                    </a>
                                    <button type="submit" class="  text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded text-lg font-bold">更新する</button>
                                </div>
                                {{-- <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                    <a class="text-indigo-500">example@email.com</a>
                                    <p class="leading-normal my-5">49 Smith St.
                                    <br>Saint Cloud, MN 56301
                                    </p>
                                    <span class="inline-flex">
                                    <a class="text-gray-500">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                        </svg>
                                    </a>
                                    <a class="ml-4 text-gray-500">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                        </svg>
                                    </a>
                                    </span>
                                </div> --}}
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
