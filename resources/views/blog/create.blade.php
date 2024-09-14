<x-app-layout>
    @push('custom-js')
        <script src="{{ asset('/js/previmage.js') }}"></script>
    @endpush

<div class="py-12">
        <h2 class="text-brown-500 font-bold text-center text:xl mb-4">新規投稿</h2>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-4/5 mx-auto">
        <x-input-error class="my-4 text-center" :messages="$errors->all()"/>

        <form method="post" action="{{ route('owner.blog.store') }}" enctype="multipart/form-data">
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
                <label class="block text-gray-700 text-sm font-bold my-2" for="imagePath">添付ファイル</label>
                <input type="file" name="image_path" id="imagePath" accept="image/*">
                <div class="flex mt-4 justify-center items-center gap-2">
                    <img id="prevImage" class=" max-w-52 hidden">
                    <button type="button" id="removeImage" class="mt-2 px-2 rounded border border-black hidden">削除</button>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 mb-10">
                {{-- <x-primary-button>
                    <a href="">確認する</a>
                </x-primary-button> --}}
                <button type="submit" class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-lg font-bold">新規登録する</button>

                <a href="{{ route('owner.blog.index') }}">
                    <button type="button" class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-base font-bold">戻る</button>
                </a>
            </div>

        </form>
    </div>
</div>

</x-app-layout>