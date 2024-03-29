<?php

namespace App\Http\Controllers;

use App\Course;
use App\Files;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $course=Course::all();
        return view('Home.home',compact("course"));
    }
    public function showCourse($id){
        $course=Course::find($id);
        return view('Home.course',compact("course","id"));

    }
}
