<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Edit Course: {{ $course->title }}</h1>

        <form method="POST" action="/courses/{{ $course->id }}">
            @csrf
            @method('PUT') 

            <div class="mb-4">
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" value="{{ $course->title }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Slug</label>
                <input type="text" name="slug" value="{{ $course->slug }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Price</label>
                <input type="number" name="price" value="{{ $course->price }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Image Filename</label>
                <input type="text" name="image" value="{{ $course->image }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ $course->description }}</textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Update Course
            </button>
        </form>

        <form method="POST" action="/courses/{{ $course->id }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">
                Delete this Course
            </button>
        </form>
    </div>

</body>
</html>
