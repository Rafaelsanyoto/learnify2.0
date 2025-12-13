<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialsController extends Controller
{
     public function Materials(){

        return view("Materials");
    }

    public function details (Course $course){
        $user = Auth::user();
        
        if (!$user -> courses()-> where('course_id', $course->id)->exists()){
            abort(403, 'You are not enrolled in this course');
        }
        return view('Materials', compact('course'));
    }

}
