<?php

namespace App\Http\Controllers;

use App\Models\Blacklisting;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth()->guest()) {
            # code...
            $schools = School::latest()->filter(request(['searchschool']))->reorder('id', 'asc')->paginate(15);
            return view('pages.schools')->with('schools', $schools);
        } else {
            # code...
            alert('Not Authorized to Access Page. Please login');
            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth()->guest()) {
            # code...
            return view('school.create');
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

        if (!Auth()->guest()) {
            # code...
            $school = School::find($id);
            $blacklistings = Blacklisting::all()->where('university', $school->name);
            return view('school.show')->with('school', $school)->with('blacklistings', $blacklistings);
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
            $school = School::find($id);
            // $students = School::all()->students()->where('id', 1);
            return view('school.edit')->with('school', $school);
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

    // public function searchSchool(Request $request) {

    //     $schools = School::all()->where('name', $request->input('searchschool'));
    //     return view('pages.schools')->with('schools', $schools);
    // }
}
