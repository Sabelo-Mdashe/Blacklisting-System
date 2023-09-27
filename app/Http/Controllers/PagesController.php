<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function students() {
        return view('pages.students');
    }

    public function schools() {
        return view('pages.schools');
    }

    public function createTeacher() {
        return view('student_teacher.create');
    }
}
