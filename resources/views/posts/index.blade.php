<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <a href="/" class="text-blue-600 mb-4 inline-block">← Back to Home</a>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title }}</h1>

        {{-- <div class="space-y-4">
            @foreach($posts as $post)
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600">{{ $post['title'] }}</h2>
                <p class="text-gray-600 mt-2">{{ $post['content'] }}</p>
                <a href="/posts/{{ $post['id'] }}" class="inline-block mt-3 text-blue-500 hover:text-blue-700">
                    Read more →
                </a>
            </div>
            @endforeach
        </div> --}}

        <div class="space-y-4">
            @forelse($posts as $post)
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600">{{ $post->title }}</h2>
                <p class="text-gray-500 text-sm mt-1">
                    Published: {{ $post->created_at->format('M d, Y') }}
                </p>
                <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 150) }}</p>
                <a href="/posts/{{ $post->id }}" class="inline-block mt-3 text-blue-500 hover:text-blue-700">
                    Read more →
                </a>
            </div>
            @empty
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <p class="text-gray-600">No posts available yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>