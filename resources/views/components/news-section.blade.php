<!-- news -->
<h2 class="text-2xl font-bold text-white ml- mb-7"><img class="mx-auto" src="{{ asset('img/news1x.png') }}" alt="news"></h2>
<div class="flex sm:justify-around sm:flex-row flex-col items-center">
@foreach ( $blogs as $blog )
<div class="text-center">
    <a href="{{ route('user.news.show', ['id' => $blog->id]) }}">
    @empty($blog->image_path)
    <img class="h-32 w-full object-cover object-center rounded-lg" src="{{ asset('storage/images/noimage.png')}}" alt="blog">
    @else
    <img class="w-48 h-32 object-cover object-center rounded-lg" src="{{ asset('storage/' . $blog->image_path )}}" alt="blog">
    @endempty
    <p>
        <time>{{ $blog->created_at->format('Y/m/d') }}</time>
        <br>{{ $blog->title }}
    </p>
    </a>
</div>
@endforeach
</div>
<div class="text-center mt-6">
{{-- <a href="#">
    <button type="button" class="text-2xl text-white bg-brown-500 rounded-lg py-3 px-5">more</button>
</a> --}}
<x-primary-button>
    <a class="text-base" href="{{ route('user.news.index') }}">more</a>
</x-primary-button>
</div>

