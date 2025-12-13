<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MyCourseController extends Controller
{
     public function MyCourse()
    {
        $courses = Auth::check() ? Auth::user()->courses : collect();

        return view('MyCourse', compact('courses'));
    }
}