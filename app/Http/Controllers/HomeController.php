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
    
    public function updateUser(Request $request, string $id) {

        // dd($request->all());
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'username' => ['required', 'string', 'max:64',],
        ]);

        $avatarName = time() . '-' . $request->name . '.' . $request->avatar->extension();
        $request->avatar->storeAs('public/avatars', $avatarName);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->avatar = $avatarName;
        $user->username = $request->input('username');
        $user->update();

        return redirect('/');
    }

    public function deleteUser(string $id) {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user->delete();

        return redirect('/');
    }
}
