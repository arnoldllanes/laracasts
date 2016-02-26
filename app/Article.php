<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [

    'title',
    'body',
    'published_at',
    
    ]; //Article::create($array) // permission_id if someone would try to pass an array field of permission id and it not included in the protected fillable array than it will not work

    //puts the published at to the carbon model instead of a string to run such diffForHumans() || To built columns that are carbon instances || ex.) $aricle->published_at->format('Y-m');
    protected $dates = ['published_at'];

    //The scope modifies the query so for instance if you look into articles controller there is a scope to the query where it says '->published()' useful for using the query across the application and refer back to this convention

    //Mid course review __ Article::published($value);
    public function scopePublished($query){
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query){
    	$query->where('published_at', '>', Carbon::now());
    }

    //setNameAttribute this is the convention for manipulating data before or after data is put into the database (This is a mutator) useful for retrieving parts of outputs such as taking in an input from a date but running the time of the date in the background

    //Mid course review __ to have laravel do something behind the scenes
    public function setPublishAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    //Owner of an article can be shown in

    //Mid course review : if can article is written by a user than you want to fetch a user associated with an article
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id'); // user_id Hook
    } // $article->user // user_id

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //Get a list of tag ids associated with the current article
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();    
    }
    
}
