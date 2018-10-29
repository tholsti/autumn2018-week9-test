<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function heroes() {
        $this->belongsToMany('App\Hero', 'hero_image');
    }
}
