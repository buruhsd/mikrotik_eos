<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
    	'device_name',
    	'device_ip',
    	'device_port_api',
    	'device_username',
    	'device_password',
    	'region_id'
    ];
}
