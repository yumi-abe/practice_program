
@push('custom-css')
<link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endpush

@push('custom-js')
<script src="{{ asset('/js/modal.js') }}"></script>
@endpush

<div class="text-center">
    <h2 class="text-2xl font-bold text-brown-500 ml- mb-7">CAST</h2>
    <p>画像をクリックすると詳細が見れます</p>
</div>
<div class="sm:grid sm:grid-cols-3">
    @foreach ($castProfile as $cast)
    <!-- キャスト紹介部分 -->
    <div class="my-10 flex flex-col items-center">
        <div class="cursor-pointer" onclick="openModal('modal{{ $cast->id }}')"> <!-- 修正箇所 -->
            <img src="{{asset('img/cast11x.png')}}" alt="cat">
        </div>
        <div class="cursor-pointer">
            <p class="mt-4">{{ $cast->cast_name }} ♂</p>
        </div>
    </div>
    <!-- モーダル -->
    <div id="modal{{ $cast->id }}" class="modal z-10 w-full h-full fixed left-0 top-0  justify-center items-center hidden modal-hidden modal-transition"  style="background-color: rgba(128, 128, 128, 0.5);">
        <div class="z-20 bg-body p-10 max-w-lg flex flex-col rounded-lg m-auto relative top-20 sm:top-10">
            <div class="text-right text-4xl mb-2">
                <span class="cursor-pointer" onclick="closeModal('modal{{ $cast->id }}')">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
            <div>
                <img class="rounded-lg" src="{{ asset('img/popup/2x/poppuup1@2x.jpg') }}" alt="cat">
            </div>
            <dl class="mt-4">
                <div class="flex gap-4 my-1">
                    <dt class="font-bold">名前</dt><dd>{{ $cast->cast_name }}　♂</dd>
                </div>
                <div class="flex gap-4 my-1">
                    <dt class="font-bold">年齢</dt><dd>3歳</dd>
                </div>
                <div class="flex gap-4 my-1">
                    <dt class="font-bold">種類</dt><dd>エキゾチックショートヘア</dd>
                </div>
                <div class="flex gap-4 my-1">
                    <dt class="font-bold">性格</dt><dd>おっとり</dd>
                </div>
            </dl>

        </div>
    </div>
    @endforeach
</div>

