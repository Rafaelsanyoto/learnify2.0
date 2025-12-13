<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Add New Course</h1>

        <form method="POST" action="/courses">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Slug (URL identifier)</label>
                <input type="text" name="slug" class="w-full border p-2 rounded" placeholder="e.g. intro-to-ai" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Price</label>
                <input type="number" name="price" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Image Filename</label>
                <input type="text" name="image" class="w-full border p-2 rounded" placeholder="e.g. ai.png">
                <p class="text-xs text-gray-500">Make sure this file exists in your public folder.</p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="4" required></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Course
            </button>
        </form>
    </div>

</body>
</html>
