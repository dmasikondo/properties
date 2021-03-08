<?php

namespace App\Http\Livewire\Estate;
use Illuminate\Support\Str;
use Livewire\Component;
use Auth;

class Create extends Component
{

	public $location;
	public $address1;
	public $address2;
	public $city;
	public $price;
	public $area;
	public $description;
	//public $slug;

	public function addProperty()
	{
		
		$data =$this->validate([
			'location' =>'required',
			'address1' =>'required',
			'address2' =>'required',
			'city' =>'required',
			'price' =>'required',
			'area' =>'required',
			'description' =>'required',
		]);

		$slug = Str::random(40);
		Auth::user()->estates()->create([
			'location' =>$this->location,
			'address1' =>$this->address1,
			'address2' =>$this->address2,
			'city' =>$this->city,
			'price' =>$this->price,
			'area' =>$this->area,
			'description' =>$this->description,
			'slug' =>$slug,
		]);
			$this->location='';
			$this->address1='';
			$this->address2='';
			$this->city='';
			$this->price='';
			$this->area='';
			$this->description='';

		session()->flash('message','The Property was successfully listed');
		return redirect('/estates/'.$slug);
	}	
    public function render()
    {
        return view('livewire.estate.create');
    }
}
