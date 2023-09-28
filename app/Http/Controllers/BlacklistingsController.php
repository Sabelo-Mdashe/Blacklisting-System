<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blacklisting;

class BlacklistingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blacklistings = Blacklisting::all();

        return view('pages.blacklistings')->with('blacklistings', $blacklistings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blacklisting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'university' => 'required',
            'reason' => 'required'
        ]);

        $blacklisting = new Blacklisting;
        $blacklisting->candidate_firstname = $request->input('name');
        $blacklisting->candidate_lastname = $request->input('surname');
        $blacklisting->school = $request->input('university');
        $blacklisting->blacklist_reason = $request->input('reason');
        $blacklisting->save();

        return redirect('/blacklistings');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blacklisting = Blacklisting::find($id);

        return view('blacklisting.show')->with('blacklisting', $blacklisting);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
