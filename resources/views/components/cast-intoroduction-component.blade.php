<div class="text-center">
    <h2 class="text-2xl font-bold text-brown-500 ml- mb-7">CAST</h2>
    <p>画像をクリックすると詳細が見れます</p>
</div>
<div class="sm:grid sm:grid-cols-3">
    @foreach ($casts->take(6) as $cast)
    <!-- キャスト紹介部分 -->
    <div class="my-10 flex flex-col items-center">
        <div class="cursor-pointer" onclick="openModal('modal{{ $cast->id }}')">
            @empty($cast->main_image_path)
            <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/images/noimage.png')}}" alt="noimage">
            @else
            <div class="relative">
                @if ($cast->isNew())
                    <img class="absolute -top-5 -left-5 w-14" src="{{ asset('img/new.png')}}" alt="new">
                @endif
                <img src="{{ asset('storage/' . $cast->main_image_path )}}" alt="catprev">
            </div>
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
    @include('components.cast-modal',['cast' => $cast])
    
    @endforeach
</div>
@if ($casts->count() > 6)
    <div class="text-center">
        <x-primary-button>
            <a class="text-base" href="{{ url('/cast') }}">MORE</a>
        </x-primary-button>
    </div>
@endif


