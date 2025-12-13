<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function coursesList(){
        $arrCourses = ["Math", "Sience", "English", "HTML", "CSS", "PHP"];
        return view('Landing Page')->with('courses', $arrCourses);
    }
}
