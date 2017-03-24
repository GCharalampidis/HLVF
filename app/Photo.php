<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    public $directory = "/images/";

    protected $fillable = ['path'];

    public function getPathAttribute($value)
    {
        return $this->directory.$value;
    }

}
