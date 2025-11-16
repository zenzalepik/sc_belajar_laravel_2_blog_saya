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
        
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title }}</h1>
                <a href="/posts/create" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-semibold">
                + Create New Post
            </a>
        </div>

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
                    • Status: <span class="{{ $post->is_published ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ $post->is_published ? 'Published' : 'Draft' }}
                    </span>
                </p>
                <p class="text-gray-600 mt-2">{{ Str::limit($post->content, 150) }}</p>
                <a href="/posts/{{ $post->id }}" class="inline-block mt-3 text-blue-500 hover:text-blue-700">
                    Read more →
                </a>
                <div class="flex gap-2 mt-4">
                    <a href="/posts/{{ $post->id }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        View
                    </a>
                    <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>
                    <form action="/posts/{{ $post->id }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm"
                            onclick="return confirm('Are you sure you want to delete this post?')"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <p class="text-gray-600">No posts available yet.</p>
                <a href="/posts/create" class="inline-block mt-3 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Create First Post
                </a>
            </div>
            @endforelse
        </div>
    </div>
</body>
</html>