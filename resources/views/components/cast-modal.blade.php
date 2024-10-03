@push('custom-css')
<link rel="stylesheet" href="{{ asset('/css/modal.css') }}">
@endpush

@push('custom-js')
<script src="{{ asset('/js/modal.js') }}"></script>
@endpush

<!-- モーダル -->
<div id="modal{{ $cast->id }}" class="modal z-10 w-full h-full fixed left-0 top-0  justify-center items-center hidden modal-hidden modal-transition"  style="background-color: rgba(128, 128, 128, 0.5);">
    <div class="z-20 bg-body py-4 px-8 max-w-lg flex flex-col rounded-lg m-auto relative top-20 sm:top-10">
        <div class="text-right text-4xl mb-2">
            <span class="cursor-pointer" onclick="closeModal('modal{{ $cast->id }}')">
                <i class="fa-solid fa-xmark"></i>
            </span>
        </div>
        <div>
            @empty($cast->sub_image_path)
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/images/noimage.png')}}" alt="noimage">
            @else
            <img class="h-60 rounded-lg w-full object-cover object-center" src="{{ asset('storage/' . $cast->sub_image_path )}}" alt="cat">
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