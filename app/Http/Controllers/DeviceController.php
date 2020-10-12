<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
    	// $data = Region::all();
        return view('device.index');
    }
}
