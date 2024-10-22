<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function showTheory() {
        return view('features.theory');
    }

    public function showVideos() {
        return view('features.videos');
    }

    public function showSolutions() {
        return view('features.solutions');
    }
}
