<?php 

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;


trait MultiTenantable {

    protected static function bootMultiTenantable()
    {
        if (auth()->check()) {
        	// var_dump(auth()->user()->currentTeam); die();
            static::creating(function ($model) {
                $model->created_by_team_id = auth()->user()->currentTeam->id;
            });

            static::addGlobalScope('created_by_team_id', function (Builder $builder) {
                $builder->where('created_by_team_id', auth()->user()->currentTeam->id);
            });
        }
    }

}