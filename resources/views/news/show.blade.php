<x-home-layout>
    <article>
        <div class="text-gray-600 flex flex-col items-center py-10">
            <img class="lg:h-48 md:h-36 object-cover object-center" src="{{ asset('storage/' . $blog->image_path )}}" alt="blog">
            <h2 class="my-10 text-4xl">{{ $blog->title }}</h2>
            <p class="text-left text-black">{!! nl2br(e($blog->content)) !!}</p>

        </div>
        <div class="text-center my-10">
            <x-primary-button>
                <a href="{{ route('user.news.index') }}">一覧に戻る</a>
            </x-primary-button>
        </div>




    </article>
</x-home-layout>
