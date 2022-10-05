<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    学習記録一覧です
                </div>
                @foreach ($posts as $post)
                    <article class="w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal">
                        <a href="{{ route('posts.show', $post) }}">
                            @foreach($users as $user)<p>{{ $user->name }}</p>@endforeach
                            <p>記事作成日:{{ date('Y-d H:i:s', strtotime('-1 day')) < $post->created_at ?: '' }}{{ $post->created_at }}
                            </p>
                            <div>メモ
                            <br>
                            <textarea>{{ $post->memo }}</textarea>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
