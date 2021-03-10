<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;
use App\Models\User;
use Auth;

class EstateController extends Controller
{
    public function create()
    {
        return view('estate.create');
    }
    public function show(Estate $estate)
    {
    	return view('estate.show', compact('estate'));
    }
    /**
     * Show the properties that a user posted
     */

    public function myproperties()
    {
        $estates = Estate::where('user_id',Auth::user()->id)->paginate(2);
        return view('estate.index', compact('estates'));
    }
    public function visibility(Estate $estate)
    {
        $this->validate(request(),[
            'visibility' =>'required',
        ]);
        
    	$users = User::whereHas('roles', function($role) {
   		 $role->where('name', '=', 'admin');
			})->get();
    	$realtor = User::where('id',$estate->user_id)->first();
    	if(request()->visibility =='public' && $estate->approved == false)
    	{
    		foreach($users as $user){
    			$user->notify(new \App\Notifications\EstateNotification($realtor, $estate));
    		}
    		
    	}
    	$estate->update(['visibility' =>request()->visibility]);
    	return redirect()->back();
    } 

    public function publish(Estate $estate)
    {
    	$estate->update(['approved' =>true]);
    	return redirect()->back();

    }   
}
