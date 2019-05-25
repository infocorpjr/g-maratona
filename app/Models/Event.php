<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'location', 'date', 'time', 'path_capa', 'draft'
    ];

    /**
     * Get the Post Gallery.
     */
    public function gallery()
    {
        return $this->morphOne('App\Models\Gallery', 'galleryable');
    }
}
