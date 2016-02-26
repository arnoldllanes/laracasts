<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [
		'name'
	];

	#Return \Illuminate\Database\Eloquent\Relations\BelongsToMany

    public function articles()
    {

    	return $this->belongsToMany('App\Article');

    }
}
