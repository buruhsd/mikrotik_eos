<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \RouterOS\Config;
use \RouterOS\Client;

// use \RouterOS;
use \RouterOS\Query;
// use \RouterOS\Util;

class CobaController extends Controller
{
	//list user hotspot
    public function index(){
    	$config = new Config([
		    'host' => '103.247.123.70',
		    'user' => 'developer',
		    'pass' => '*123#password',
		    'port' => 8728,
		]);
		$client = new Client($config);

		// var_dump($client);
		$query = new Query('/ip/hotspot/user/getall'); //lst user

		// Send query and read response from RouterOS
		$response = $client->query($query)->read();

		dd($response);
    }

    //add user
    public function addUser(){
    	$config = new Config([
		    'host' => '103.247.123.70',
		    'user' => 'developer',
		    'pass' => '*123#password',
		    'port' => 8728,
		]);
		$client = new Client($config);

		$client->connect();

		// $util = new Util($client);
// 		ip hotspot user add name=franky server=hotspot.public passwor
// d=*123# profile=default

		// var_dump($client);
		$query =( new Query('/ip/hotspot/user/add'))
				->equal('name', 'ilham')
				->equal('password', '123qwe')
				->equal('profile', 'default');

		$response = $client->query($query)->read();

		dd($response);
    }

    public function removeUser(){
    	$config = new Config([
		    'host' => '103.247.123.70',
		    'user' => 'developer',
		    'pass' => '*123#password',
		    'port' => 8728,
		]);
		$client = new Client($config);

		$client->connect();

		// $util = new Util($client);
// 		ip hotspot user add name=franky server=hotspot.public passwor
// d=*123# profile=default

		// var_dump($client);
		$query =( new Query('/ip/hotspot/user/remove'))
				->equal('.id', '*A');

		$response = $client->query($query)->readAsIterator();

		dd($response);

	}

	// ip hotspot user set name=aljawad numbers=2

	public function edit(){
		$config = new Config([
		    'host' => '103.247.123.70',
		    'user' => 'developer',
		    'pass' => '*123#password',
		    'port' => 8728,
		]);
		$client = new Client($config);

		$query =( new Query('/ip/hotspot/user/set'))
				->equal('name', 'jawad')
				->equal('.id', '*5');

		$response = $client->query($query)->readAsIterator();

		dd($response);

	}
}
