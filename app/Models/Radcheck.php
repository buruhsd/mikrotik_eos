<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    use HasFactory;

    protected $connection = 'radius';
    protected $table = 'readcheck';

    protected $fillable = [
    	'username',
    	'attribute',
    	'op',
    	'value'
    ];
}
