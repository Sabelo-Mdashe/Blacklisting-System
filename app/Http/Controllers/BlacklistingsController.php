<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklisting;
use App\Models\School;
use App\Models\Student;

class BlacklistingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!Auth()->guest()) {
            # code...
            $blacklistings = Blacklisting::all();
            return view('pages.blacklistings')->with('blacklistings', $blacklistings);
        } else {
            # code...
            return view('auth.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( /*string $id*/ )
    {
        // $student = Student::find($id);
        // return view('blacklisting.create')/*->with('student', $student)*/;
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'university' => 'required',
            'reason' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $newImageName);
        
        $blacklisting = new Blacklisting;
        $blacklisting->candidate_firstname = $request->input('name');
        $blacklisting->candidate_lastname = $request->input('surname');
        $blacklisting->school = $request->input('university');
        $blacklisting->blacklist_reason = $request->input('reason');
        $blacklisting->school_id = $request->input('university_id');
        $blacklisting->image_path = $newImageName;
        $blacklisting->save();

        return redirect('/blacklistings');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if (!Auth()->guest()) {
            # code...
            $blacklisting = Blacklisting::find($id);
            $school = School::find($id);
            return view('blacklisting.show')->with('blacklisting', $blacklisting)->with('school', $school);
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
            $blacklisting = Blacklisting::find($id);
            $schools = School::all();
            return view('blacklisting.edit')->with('blacklisting', $blacklisting)->with('schools', $schools);
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
            'university' => 'required',
            'reason' => 'required'
        ]);

        $blacklisting = Blacklisting::find($id);
        $blacklisting->candidate_firstname = $request->input('name');
        $blacklisting->candidate_lastname = $request->input('surname');
        $blacklisting->school = $request->input('university');
        $blacklisting->blacklist_reason = $request->input('reason');
        $blacklisting->update();

        return view('blacklisting.show')->with('blacklisting', $blacklisting);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blacklisting = Blacklisting::find($id);
        $blacklisting->delete();

        return redirect('/blacklistings');
    }
}
