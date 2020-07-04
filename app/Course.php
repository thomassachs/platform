<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function lectures()
    {
        return $this->hasManyThrough('App\Lecture', 'App\Section');
    }

    public function descriptionItems()
    {
        return $this->hasMany('App\DescriptionItem');
    }


}
