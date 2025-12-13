<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // CREATE
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'rating'      => 'required|numeric|min:0|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = Str::slug($validated['title']);
        $count = Course::where('slug', 'LIKE', "$slug%")->count();
        $validated['slug'] = $count ? "{$slug}-" . ($count + 1) : $slug;

        if ($request->hasFile('image')) {
            $validated['image'] =
                $request->file('image')->store('courses', 'public');
        }

        Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course berhasil ditambahkan!');
    }

    // EDIT
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // UPDATE
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'rating'      => 'required|numeric|min:0|max:5',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] =
                $request->file('image')->store('courses', 'public');
        }

        $course->update($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course berhasil diperbarui!');
    }

    // DELETE
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
