<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();

        return view('pages.schools')->with('schools', $schools);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'province' => 'required'
        ]);

        $school = new School;
        $school->name = $request->input('name');
        $school->city = $request->input('city');
        $school->province = $request->input('province');
        $school->save();

        return redirect('/schools');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = School::find($id);

        return view('school.show')->with('school', $school);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $school = School::find($id);
        return view('school.edit')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'city' => 'required',
            'province' => 'required'
        ]);

        $school = School::find($id);
        $school->name = $request->input('name');
        $school->city = $request->input('city');
        $school->province = $request->input('province');
        $school->update();

        return view('school.show')->with('school', $school);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school = School::find($id);
        $school->delete();

        return redirect('/schools');
    }
}
