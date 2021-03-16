<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realta;
use Ixudra\Curl\Facades\Curl;
use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\Device;
use Carbon\Carbon;

class RealtaController extends Controller
{
    public function post(Request $request){

    	$url = $request;

    	$response = Curl::to('https://eos.solusi.cloud/'.$url)
        ->withData( array( 'foz' => 'baz' ) )
        ->get();
    	
    }

    public function test(){
    	$date = 20210315;

    	$var1 = substr($date, 0, 4);
    	$var2 = substr($date, 4, 2);
    	$var3 = substr($date, 6, 2);



    	$dt = Carbon::create($var1, $var2, $var3, 14, 0, 0);

    	echo $dt->format('j F Y H:i:s');

    	// phpinfo();
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

        $room = strtolower($request->room);
        $fnm = strtolower($request->fnm);
    	$radcheck = Radcheck::create([
            'username' => trim($room),
            'attribute' => 'Cleartext-password',
            'op' => ':=',
            'value' => trim($fnm)
        ]);

        $radcheck = Radcheck::create([
            'username' => trim($room),
            'attribute' => 'NAS-IP-Address',
            'op' => '==',
            'value' => '103.105.69.94'
        ]);

        $date = $request->co;

    	$var1 = substr($date, 0, 4);
    	$var2 = substr($date, 4, 2);
    	$var3 = substr($date, 6, 2);



    	$dt = Carbon::create($var1, $var2, $var3, 14, 0, 0);

        $radcheck = Radcheck::create([
            'username' => trim($room),
            'attribute' => 'Expiration',
            'op' => ':=',
            'value' => $dt->format('j F Y H:i:s')
        ]);

        $radreply = Radreply::create([
            'username' => trim($room),
            'attribute' => 'Mikrotik-Group',
            'op' => ':=',
            'value' => 'awann.inhouse'
        ]);

    	return response()->json(['data' => 'success']);

    }
}
