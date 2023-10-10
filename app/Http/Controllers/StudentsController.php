<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!Auth()->guest()) {
            # code...
            $students = Student::all();
            return view('pages.students')->with('students', $students);
        } else {
            # code...
            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( )
    {

        if (!Auth()->guest()) {
            # code...
            $schools = School::all();
            return view('student_teacher.create')->with('schools', $schools);
        } else {
            # code...
            return view('auth.login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $school = School::all();
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'university' => 'required',
        ]);
        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->university = $request->input('university')/*-with('id', $id)*/;
        $student->school_id = $student->university;
        $student->save();

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if (!Auth()->guest()) {
            # code...
            $student = Student::find($id);
            return view('student_teacher.show')->with('student', $student);
        } else {
            # code...
            return view('auth.login');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        if (!Auth()->guest()) {
            # code...
            $student = Student::find($id);
            // $student->name
            return view('student_teacher.edit')->with('student', $student);
        } else {
            # code...
            return view('auth.login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'university' => 'required'
        ]);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->university = $request->input('university');
        // $student->school_id = $request->input();
        $student->update();

        return view('student_teacher.show')->with('student', $student);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/students');
    }

    public function searchStudent(Request $request) {

        $students = Student::all()->where('name', $request->input('search'));
        return view('pages.students')->with('students', $students);
    }
}
