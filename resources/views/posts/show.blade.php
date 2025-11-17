<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="mb-8 py-6 border-t border-b border-gray-200 flex gap-4 justify-between">
            <a href="/posts" class="text-blue-600 mb-4 inline-block">← Back to Posts</a>
            <div class="flex gap-4 w-1/2 justify-end">
                <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg">
                    Edit Post
                </a>
                <form action="/posts/{{ $post->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg"
                        onclick="return confirm('Are you sure you want to delete this post?')"
                    >
                        Delete Post
                    </button>
                </form>
            </div>
        </div>
        
        {{-- <article class="bg-white p-6 rounded-lg shadow">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post['title'] }}</h1>
            <div class="text-gray-500 mb-6">Published on January 1, 2024</div>
            
            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed">{{ $post['content'] }}</p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="/posts" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    ← Back to All Posts
                </a>
            </div>
        </article> --}}

        <article class="bg-white p-6 rounded-lg shadow">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
            {{-- <div class="text-gray-500 mb-6">
                Published on {{ $post->created_at->format('F d, Y') }}
            </div> --}}
            <div class="text-gray-500 mb-6">
                Published on {{ $post->created_at->format('F d, Y') }} 
                by {{ $post->user->name ?? 'Unknown' }}
            </div>
            
            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $post->content }}</p>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="/posts" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    ← Back to All Posts
                </a>
            </div>
        </article>
    </div>
</body>
</html>