<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionItem extends Model
{
    protected $table = 'description_item';

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
