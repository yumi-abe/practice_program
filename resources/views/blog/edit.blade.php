<x-app-layout>
    @push('custom-js')
        <script src="{{ asset('/js/previmage.js') }}"></script>
    @endpush

    <div class="py-12">
        <h2 class="text-brown-500 font-bold text-center text:xl mb-4">編集画面</h2>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-4/5 mx-auto">
        <x-input-error class="my-4 text-center" :messages="$errors->all()"/>

        <form method="post" action="{{ route('owner.blog.update',['id' => $blog->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-4" for="title">タイトル</label>
                <input class="shadow appearance-none border rounded w-4/5 py-2 px-3 leading-tight" id="title" type="text" name="title" value="{{ $blog->title }}">
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="content">本文</label>
                <textarea class="shadow appearance-none border rounded w-4/5 py-2 px-3 leading-tight" name="content" id="content" cols="225" rows="10">{{ $blog->content }}</textarea>
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2 mb-2" for="imagePath">添付ファイル</label>
                <input type="file" name="image_path" id="imagePath" accept="image/*" class="hidden">
                <label for="imagePath" class="inline-block cursor-pointer bg-body  text-black py-2 px-4 rounded">
                    ファイルを選択
                </label>

                
                <div id="comment" class="flex mt-4 justify-center items-center gap-2">
                    <img id="prevImage" class=" max-w-52 {{ $blog->image_path ? '' : 'hidden' }}"
                    src="{{ $blog->image_path ? asset('storage/' . $blog->image_path) : '' }}" alt="previewImage">
                    <button type="button" id="removeImage" class="mt-2 px-2 rounded border border-black {{ $blog->image_path ? '' : 'hidden' }}">削除</button>
                </div>
            </div>
            <div class="mb-4 flex flex-col items-center gap-4">
                <button type="submit" class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-base font-bold">変更する</button>
                <a href="{{ route('owner.blog.show', ['id' => $blog->id]) }}">
                    <button type="button" class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-base font-bold">戻る</button>
                </a>
            </div>

        </form>
    </div>
</div>

</x-app-layout>