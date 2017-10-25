<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Movie extends Model
{

    protected $fillable = ['name', 'director', 'image_url', 'duration', 'release_date', 'genres'];

    protected $casts = [
        'genres' => 'array',
    ];

    public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode( $value );
    }

    const Rules = [
        'name' => 'required | unique',
        'director' => 'required',
        'duration' => 'required | min:1 | max:500',
        'release_date' => 'required | unique',
        'image_url' => 'url',
    ];

}
