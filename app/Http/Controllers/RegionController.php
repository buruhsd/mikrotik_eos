<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index(){
    	// $data = Region::all();
        return view('region.index');
    }

    public function store(Request $request, Region $region){
    	$data = new $region;

    	$data->fill([
    		'region_name' => $request->region_name
    	]);
    	$data->save();

    	return $data;
    }
}
