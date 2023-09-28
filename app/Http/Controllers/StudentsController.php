<?php

namespace App\Http\Controllers;
use App\Models\Student;


use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('pages.students')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student_teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'university' => 'required'
        ]);
        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->address = $request->input('address');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->university = $request->input('university');
        $student->save();

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('student_teacher.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        // $student->name
        return view('student_teacher.edit')->with('student', $student);
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
        $student->update();

        return view('student_teacher.show')->with('student', $student);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
