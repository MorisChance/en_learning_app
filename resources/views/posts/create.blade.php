<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">英語学習記録</h2>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="category">
                    カテゴリー
                </label>
            @csrf
            @foreach ($categories as $category)
                <div>
                    <input type="radio" name="category_id" id="category{{ $category->id }}" value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'checked' : '' }}>
                    <label for="category{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
            <div class="mb-4">
                <label class="block text-gray-900 text-sm mb-2" for="date">
                    学習日時<br>
                <input type="date" name="date" id="date" value="2022-10-01">
                </label>
                <label class="block text-gray-900 text-sm mb-2" for="time">
                    勉強時間
                <p><input type="time" name="time1" id="time1"> <b>to</b> <input type="time" name="time2" id="time2"></p> 
                </label>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="memo">
                    メモ
                </label>
                <textarea name="memo" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required>{{ old('memo') }}</textarea>
            </div>
            <input type="submit" value="登録"
                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>
</x-app-layout>
