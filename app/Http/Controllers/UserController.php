<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
    	$roles = Role::orderBy('name')->get();
    	$users = User::all();
    	return view('users.index', compact('users','roles'));
    }

    public function updateRole(User $user)
    {
    	$user->roles()->sync([request()->name]);
    	session()->flash('message','The User\'s  role was successfully updated');
    	return redirect()->back();
    }

    public function destroy(User $user)
    {
    	if(\Auth::user() != $user){
	    	$user->delete();
	    	session()->flash('message','The User was successfully deleted');    		
    	}
    	else{
    		session()->flash('message','Deleting own account rejected'); 
    	}

    	return redirect()->back();
    }
}
