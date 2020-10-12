<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;
use App\Models\Region;

class CreateRegion extends Component
{
	public $region_name;
    public function render()
    {
        return view('livewire.test.create-region');
    }

    public function createPost(){
    	Region::create([
    		'region_name' => $this->region_name
    	]);
    }
}
