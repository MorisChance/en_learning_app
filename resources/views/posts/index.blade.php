<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    学習記録一覧です
                </div>
                @foreach ($posts as $post)
                        <a href="{{ route('posts.show', $post) }}">
                            {{-- @foreach($users as $user)<p>{{ $user->name}}</p>@endforeach --}}
                            <p class = "text-blue-400">記録作成日:{{ date('Y-d H:i:s', strtotime('-1 day')) < $post->created_at ?: '' }}{{ $post->created_at }}</p>
                            <div>{{ $post->category_name }}</div>
                            <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3">{{ $post->memo }}</textarea>
                        </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
