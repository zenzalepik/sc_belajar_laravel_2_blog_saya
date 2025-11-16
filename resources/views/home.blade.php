<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - My Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-600">✨ My Personal Blog</h1>
            <p class="text-gray-600 mt-2">Tempat berbagi cerita dan pengetahuan</p>
        </header>

        <!-- Navigation -->
        <nav class="flex justify-center gap-6 mb-8">
            <a href="/" class="text-blue-600 font-semibold">Home</a>
            <a href="/posts" class="text-gray-600 hover:text-blue-600">Posts</a>
            <a href="/about" class="text-gray-600 hover:text-blue-600">About</a>
        </nav>

        <!-- Main Content -->
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">🎉 Welcome to My Blog!</h2>
            <p class="text-gray-600 mb-4">
                Ini adalah blog sederhana yang saya buat dengan Laravel. 
                Di sini saya akan berbagi tentang programming, tips, dan pengalaman.
            </p>
            
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="bg-blue-50 p-4 rounded">
                    <h3 class="font-semibold text-blue-800">📚 Latest Posts</h3>
                    <p class="text-sm text-blue-600 mt-2">Belum ada posts</p>
                </div>
                <div class="bg-green-50 p-4 rounded">
                    <h3 class="font-semibold text-green-800">👨‍💻 About Me</h3>
                    <p class="text-sm text-green-600 mt-2">Web developer pemula</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="/posts" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold">
                    Lihat Semua Posts →
                </a>
            </div>
        </div>
    </div>
</body>
</html>