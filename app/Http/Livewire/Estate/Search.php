<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;
use App\Models\Estate;

class Search extends Component
{
	public $searchTerm;


    public function render()
    {
    	

    	$searchTerm = '%'.$this->searchTerm.'%';
    	$estates = Estate::where('location', 'LIKE',$searchTerm)
    	->orWhere('area','LIKE',$searchTerm)
    	->orWhere('city','LIKE',$searchTerm)
    	->orWhere('price','LIKE',$searchTerm)
    	->get();
        return view('livewire.estate.search', compact('estates'));
    }
}
