<x-app-layout>
    @push('custom-js')
        <script src="{{ asset('/js/previmage.js') }}"></script>
    @endpush

<div class="py-12">
        <h2 class="text-brown-500 font-bold text-center text:xl mb-4">新規キャスト登録</h2>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-4/5 mx-auto">
        <x-input-error class="my-4 text-center" :messages="$errors->all()"/>

        <form method="post" action="{{ route('owner.cast-list.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="sm:flex sm:justify-center sm:gap-16 sm:items-center">
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-4" for="cast_name">名前</label>
                <input class="shadow appearance-none border rounded py-2 px-3 leading-tight w-72" id="cast_name" type="text" name="cast_name" value="{{old('cast_name')}}">
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-4" for="types">種類</label>
                <input class="shadow appearance-none border rounded py-2 px-3 leading-tight w-72" id="types" type="text" name="types" value="{{old('types')}}">
            </div>
            </div>
            <div class="sm:flex sm:justify-center sm:gap-16 sm:items-center">
                <div class="mb-4 text-center">
                    <label class="block text-gray-700 text-sm font-bold my-4 w-72" for="gender">性別</label>
                    <input type="radio" name="gender" value="1" {{old('gender') == 1 ? 'checked' : '' }}>オス（♂）
                    <input type="radio" name="gender" value="2" {{old('gender') == 2 ? 'checked' : '' }}>メス（♀）
                </div>
                <div class="mb-4 text-center">
                    <label class="block text-gray-700 text-sm font-bold my-4" for="age">年齢</label>
                    <input class="shadow appearance-none border rounded py-2 px-3 leading-tight w-72" id="age" type="number" name="age" value="{{old('age')}}">
                </div>
            </div>
            
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="character">性格</label>
                <input class="shadow appearance-none border rounded w-4/5 py-2 px-3 leading-tight" id="character" type="text" name="character" value="{{old('character')}}">
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="main_image_path">メイン画像</label>
                <input type="file" name="main_image_path" id="main_image_path" accept="image/*" class="image-input">
                <div class="flex mt-4 justify-center items-center gap-2">
                    <img class="image-preview max-w-52 hidden">
                    <button type="button" class="remove-image mt-2 px-2 rounded border border-black hidden">削除</button>
                </div>
            </div>
            <div class="mb-4 text-center">
                <label class="block text-gray-700 text-sm font-bold my-2" for="sub_image_path">サブ画像</label>
                <input type="file" name="sub_image_path" id="sub_image_path" accept="image/*" class="image-input">
                <div class="flex mt-4 justify-center items-center gap-2">
                    <img class="image-preview max-w-52 hidden">
                    <button type="button" class="remove-image mt-2 px-2 rounded border border-black hidden">削除</button>
                </div>
            </div>
            <div class="flex flex-col items-center gap-4 mb-10">
                <button type="submit" class="text-white bg-brown-500 border-0 py-2 px-8 focus:outline-none hover:bg-brown-400 rounded sm:text-lg font-bold">新規登録する</button>

                <a href="{{ route('owner.cast-list.index') }}">
                    <button type="button" class="text-white bg-gray-400 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-base font-bold">戻る</button>
                </a>
            </div>

        </form>
    </div>
</div>

</x-app-layout>