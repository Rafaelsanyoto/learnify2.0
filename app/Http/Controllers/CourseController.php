<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();
        $search = $request->input('search');

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $courses = $query->get();

        return view('coursecatalog', compact('courses', 'search'));
    }


    public function create()
    {
        return view('courses.create');
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'       => 'required',
            'slug'        => 'required|unique:courses,slug',
            'price'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable',
        ]);

        Course::create($attributes);

        return redirect('/courses')->with('success', __('messages.course_created'));
    }


    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $attributes = $request->validate([
            'title'       => 'required',
            'slug'        => 'required',
            'price'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable',
        ]);

        $course->update($attributes);

        return redirect('/courses')->with('success', __('messages.course_updated'));
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('/courses')->with('success', __('messages.course_deleted'));
    }

    public function apply(Course $course)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', __('messages.login_to_apply'));
        }

        //check udah apply atau belum
        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('error', __('messages.already_enrolled'));
        }

        // gabungin course dengan user
        $user->courses()->attach($course->id);

        return back()->with('success', __('messages.successfully_applied'));
    }

    public function submit(Request $request, $id)
    {
        return redirect()->route('home')->with('success', __('messages.course_submitted'));
    }
}
