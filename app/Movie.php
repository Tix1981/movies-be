<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $casts = [
        'genres' => 'array',
    ];

    public function setGenresAttribute($value)
    {
        $this->attributes['genres'] = json_encode( $value );
    }

}
