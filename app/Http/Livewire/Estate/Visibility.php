<?php

namespace App\Http\Livewire\Estate;

use Livewire\Component;
use App\Models\Estate;

class Visibility extends Component
{
	public $estateSlug;
	public $visibility;
	public $estate;

	protected $listeners =[
		'selectedPropertySlug',
	];


	public function selectedPropertySlug($slug)
	{		
		$this->estateSlug = $slug;
	}	
	public function changePropertyVisibility()
	{
		//$estate = Estate::where('slug',$this->estateSlug)->firstOrfail();
		dd($this->estateSlug);

	}
    public function render()
    {
        return view('livewire.estate.visibility');
    }
}
