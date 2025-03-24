<?php

namespace App\Http\Controllers;

use App\Course;
use App\Institution;

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< Updated upstream
        $newestCourses = Course::orderBy('id', 'desc')->take(6)->get();
=======
        $newestCourses = Course::orderBy('id', 'desc')->take(9)->get();
>>>>>>> Stashed changes
        $randomInstitutions = Institution::inRandomOrder()->take(4)->get();

        return view('home', compact(['newestCourses', 'randomInstitutions']));
    }
}
