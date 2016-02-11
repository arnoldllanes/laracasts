<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [

    'title',
    'body',
    'published_at'

    ];

    //puts the published at to the carbon model instead of a string to run such diffForHumans()
    protected $dates = ['published_at'];

    //The scope modifies the query so for instance if you look into articles controller there is a scope to the query where it says '->published()' useful for using the query across the application and refer back to this convention
    public function scopePublished($query){
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query){
    	$query->where('published_at', '>', Carbon::now());
    }

    //setNameAttribute this is the convention for manipulating data before or after data is put into the database (This is a mutator) useful for retrieving parts of outputs such as taking in an input from a date but running the time of the date in the background
    public function setPublishAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
    
}
