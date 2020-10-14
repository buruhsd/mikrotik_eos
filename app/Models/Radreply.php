<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radreply extends Model
{
    use HasFactory;

    protected $connection = 'radius';
    protected $table = 'radreply';

    protected $fillable = [
    	'username',
    	'attribute',
    	'op',
    	'value'
    ];

    public $timestamps = false;
}
