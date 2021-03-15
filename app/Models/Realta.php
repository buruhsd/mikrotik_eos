<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realta extends Model
{
    use HasFactory;

    protected $fillable = [
    	'key',
        'mode',
        'room',
        'rsvno',
        'fnm',
        'lnm',
        'ci',
        'co',
        'citm',
        'cotm',
        'coid',
        'gsph',
        'rate',
        'vip',
        'lnm1',
        'fnm1',
        'profid1',
        'lnm2',
        'fnm2',
        'profid2',
        'lnm3',
        'fnm3',
        'profid3',
    ];
}
