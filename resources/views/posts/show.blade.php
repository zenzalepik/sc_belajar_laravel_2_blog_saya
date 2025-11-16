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
        <a href="/posts" class="text-blue-600 mb-4 inline-block">← Back to Posts</a>
        
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
            <div class="text-gray-500 mb-6">
                Published on {{ $post->created_at->format('F d, Y') }}
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