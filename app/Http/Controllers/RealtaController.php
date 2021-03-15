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

    	$data = new Realta;
    	$data->fill([
    		'key' => $request->key,
	        'mode'  => $request->mode,
	        'room' => $request->room,
	        'rsvno' => $request->rsvno,
	        'fnm' => $request->fnm,
	        'lnm' => $request->lnm,
	        'ci' => $request->ci,
	        'co' => $request->co,
	        'citm' => $request->citm,
	        'cotm' => $request->cotm,
	        'coid' => $request->coid,
	        'gsph' => $request->gsph,
	        'rate' => $request->rate,
	        'vip' => $request->vip,
	        'lnm1' => $request->lnm1,
	        'fnm1' => $request->fnm1,
	        'profid1' => $request->profid1,
	        'lnm2' => $request->lnm2,
	        'fnm2' => $request->fnm2,
	        'profid2' => $request->profid2,
	        'lnm3' => $request->lnm3,
	        'fnm3' => $request->fnm3,
	        'profid3' => $request->profid3,
    	]);

    	$data->save();

    	return response()->json(['data' => 'success']);

    }
}
