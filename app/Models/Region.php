<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\MultiTenantable;

class Region extends Model
{
    use HasFactory, MultiTenantable;

    protected $fillable = [
    	'region_name',
    	'created_by_team_id'
    ];
}
