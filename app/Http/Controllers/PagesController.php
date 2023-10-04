<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        if (!Auth()->guest()) {
            return view('home');
        } else {
            return view('auth.login');
        }
        
    }

    public function students() {
        return view('pages.students');
    }

    public function schools() {
        return view('pages.schools');
    }
}
