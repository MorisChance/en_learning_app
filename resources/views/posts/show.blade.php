<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">
        <h3>{{ $post->user->name }}</h3>
        @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        @endforeach
        {{-- <div class="mb-4"> --}}
            {{-- <h3>学習日時:{{$ }}</h3> --}}

            {{-- <input type="date" name="date" id="date" value="2022-10-01">
            </label>
            <label class="block text-gray-900 text-sm mb-2" for="time">
                勉強時間
                <p><input type="time" name="time" id="time"> <b>to</b> <input type="time" name="time"
                        id="time"></p>
            </label>
            <div class="flex flex-row text-center my-4">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
                @endcan
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                    </form>
                @endcan
            </div> --}}
        </div>
</x-app-layout>
