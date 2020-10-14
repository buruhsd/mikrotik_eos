<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radreply extends Model
{
    use HasFactory;

    protected $connection = 'radius';
    protected $table = 'readreply';

    protected $fillable = [
    	'username',
    	'attribute',
    	'op',
    	'value'
    ];
}
