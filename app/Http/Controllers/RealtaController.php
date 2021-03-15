<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realta;
use Ixudra\Curl\Facades\Curl;

class RealtaController extends Controller
{
    public function post(Request $request){

    	$url = $request;

    	$response = Curl::to('https://eos.solusi.cloud/'.$url)
        ->withData( array( 'foz' => 'baz' ) )
        ->get();
    	
    }


    public function getData(Request $request){

    	var_dump($request); die();

    	$data = new Realta;
    	$data->fill([
    		'data' => $request
    	]);

    	$data->save();

    	return response()->json(['data' => 'success']);

    }
}
