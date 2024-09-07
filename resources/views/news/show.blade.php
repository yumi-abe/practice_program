<x-home-layout>
    <article>
        <div class="text-gray-600 flex flex-col items-center py-10">
            <img class="lg:h-48 md:h-36 object-cover object-center" src="https://dummyimage.com/720x400" alt="blog">
            <h2 class="my-10 text-4xl">{{ $blog->title }}</h2>
            <p class="w-3/5 text-center">{{ $blog->content }}</p>

        </div>
        <div class="text-center my-10">
            <x-primary-button>
                <a href="{{ route('user.news.index') }}">一覧に戻る</a>
            </x-primary-button>
        </div>




    </article>
</x-home-layout>
