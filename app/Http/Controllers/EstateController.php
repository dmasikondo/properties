<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estate;

class EstateController extends Controller
{
    public function show(Estate $estate)
    {
    	return view('estate.show', compact('estate'));
    }

    public function visibility(Estate $estate)
    {
    	//dd(request()->visibility);
    	$estate->update(['visibility' =>request()->visibility]);
    	return redirect()->back();
    }    
}
