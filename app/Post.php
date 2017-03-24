<?php
//php artisan make:model Post -m

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $directory = "/images/";
    //In order to create() rows with multiple columns
    protected $fillable = ['title', 'content', 'path'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }
}
