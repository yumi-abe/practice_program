<x-app-layout>
    <div class="py-12">
        <h2 class="text-brown-500 font-bold text-center text:xl mb-4">新規投稿</h2>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-4/5 mx-auto">
        <form method="post" action="{{ route('owner.blog.store') }}">
            @csrf
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-4" for="title">タイトル</label>
                <input class="shadow appearance-none border rounded w-4/5 py-2 px-3 leading-tight" id="title" type="text" name="title" value="{{old('title')}}">
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="content">本文</label>
                <textarea class="shadow appearance-none border rounded w-4/5 py-2 px-3 leading-tight" name="content" id="content" cols="225" rows="10">{{old('content')}}</textarea>
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="image-path">添付ファイル</label>
                <input type="file" name="image_path">
            </div>
            <div class="text-center mb-4">
                {{-- <x-primary-button>
                    <a href="">確認する</a>
                </x-primary-button> --}}
                <button type="submit" class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-lg">新規登録する</button>

            </div>

        </form>
    </div>
</div>

</x-app-layout>