<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;
use App\Models\Estate;
use Livewire\WithPagination;

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
    	->paginate(3);
        return view('livewire.estate.search', compact('estates'));
    }
}
