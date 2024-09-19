<x-home-layout>
    
        
@push('custom-css')
<link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endpush

@push('custom-js')
<script src="{{ asset('/js/modal.js') }}"></script>
@endpush
<div class="text-center py-10 ">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-brown-500 ml- mb-7">CAST</h2>
        <p>画像をクリックすると詳細が見れます</p>
    </div>
       {{-- 管理者でログインしている場合は管理者ページのリンクを表示 --}}
       @if (Auth::guard('owners')->check())
       <div class="text-right mr-6">
          <x-primary-button>
            <a class="text-base" href="{{ route('owner.cast-list.index') }}">管理者ページへ</a>
          </x-primary-button>
       </div>
        @endif

    <div class="sm:grid sm:grid-cols-3">
        @foreach ($castProfile as $cast)
        <!-- キャスト紹介部分 -->
        <div class="my-10 flex flex-col items-center">
            <div class="cursor-pointer" onclick="openModal('modal{{ $cast->id }}')">
                @empty($cast->main_image_path)
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/images/noimage.png')}}" alt="noimage">
                @else
                <img src="{{ asset('storage/' . $cast->main_image_path )}}" alt="catprev">
                @endempty

            </div>
            <div class="cursor-pointer">
                <p class="mt-4">{{ $cast->cast_name }} 
                    @if ($cast->gender === 1)
                            ♂
                        @else
                            ♀
                        @endif
                </p>
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
                    @empty($cast->sub_image_path)
                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/images/noimage.png')}}" alt="noimage">
                    @else
                    <img class="rounded-lg" src="{{ asset('storage/' . $cast->sub_image_path )}}" alt="cat">
                    @endempty
                </div>
                <dl class="mt-4">
                    <div class="flex gap-4 my-1">
                        <dt class="font-bold">名前</dt>
                        <dd>{{ $cast->cast_name }}　
                            @if ($cast->gender === 1)
                                    ♂
                                @else
                                    ♀
                                @endif
                            </dd>
                    </div>
                    <div class="flex gap-4 my-1">
                        <dt class="font-bold">年齢</dt><dd>{{ $cast->age }} 歳</dd>
                    </div>
                    <div class="flex gap-4 my-1">
                        <dt class="font-bold">種類</dt><dd>{{ $cast->types }}</dd>
                    </div>
                    <div class="flex gap-4 my-1">
                        <dt class="font-bold">性格</dt><dd>{{ $cast->character }}</dd>
                    </div>
                </dl>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        <x-primary-button>
            <a class="text-base" href="{{ url('/') }}">戻る</a>
        </x-primary-button>
    </div>
</div>
</x-home-layout>
</html>
