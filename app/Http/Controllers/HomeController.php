<?php

namespace App\Http\Controllers;

use App\Models\Blacklisting;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blacklistings = Blacklisting::paginate(10);
        return view('home')->with('blacklistings', $blacklistings);
    }
    public function updateProfile(Request $request, User $user) {

        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'avatar' => 'required'
        ]);

        $avatarName = time() . '-' . $request->name . '.' . $request->avatar->extension();
        $request->file('avatar')->store('public/avatars', $avatarName);
        
        // $user_id = auth()->user()->id;
        // $user = User::find($id);
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->avatar = $avatarName;
        $user->update();

        return redirect('/');
    }
}
