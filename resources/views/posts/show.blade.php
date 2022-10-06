<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class ="text-4xl text-black-900 font-semibold text-center">{{ $post->user->name }}</h3>
        @foreach ($categories as $category)
            <div class = "text-2xl text-black-400 ">
                <input type="radio" name="category_id" id="category{{ $category->id }}" value="{{ $category->id }}"
                    {{ old('category_id', $post->category_id) == $category->id ? 'checked' : '' }}>
                <label for="category{{ $category->id }}">{{ $category->name }}</label>
            </div>
        @endforeach
        <p>勉強日付：{{ $post->date }}</p>
        <p>勉強日時: {{ $post->time1 }} から {{ $post->time2 }}</p>
        <textarea name="body" rows="10"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
            required>{{ $post->memo }}
        </textarea>
        <div class="flex flex-row text-center my-4">
        {{-- Bladeテンプレートで認可の制御を行う場合は、@canや@cannotディレクティブを使用します。@canを入れた時点で編集や削除が表記されない！！ --}}
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            @endcan
        </div>
    </div>
</x-app-layout>
