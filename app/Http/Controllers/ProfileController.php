<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
      
        foreach(Auth::user()->roles as $item)
        {
            $roleType = $item['name'];
        }
        $profile = User::where('id', Auth::id())->first();
        
        return view('profile.index', compact('profile', 'roleType'));
    }

    public function edit(){
        
        $user_details = User::where('id',  Auth::id())->first();
        return view('users/edit', compact('user_details'));
    }

    public function editPassword()
    {
        $id = Auth::id();
        return view('auth/passwords/index', compact('id'));
    }
}
