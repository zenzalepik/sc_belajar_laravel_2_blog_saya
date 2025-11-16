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
        <a href="/posts/{{ $post->id }}" class="text-blue-600 mb-4 inline-block">← Back to Post</a>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $title }}</h1>

        <div class="bg-white p-6 rounded-lg shadow">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Title Input -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Post Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        value="{{ old('title', $post->title) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    >
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Content Textarea -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea 
                        name="content" 
                        id="content" 
                        rows="10"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    >{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Publish Status -->
                <div class="mb-6">
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            name="is_published" 
                            value="1"
                            {{ $post->is_published ? 'checked' : '' }}
                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                        >
                        <span class="ml-2 text-gray-700">Publish this post</span>
                    </label>
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex gap-4">
                    <button 
                        type="submit" 
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition duration-200"
                    >
                        Update Post
                    </button>
                    <a 
                        href="/posts/{{ $post->id }}" 
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg font-semibold transition duration-200"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>