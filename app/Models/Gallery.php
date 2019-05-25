<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'galeryable_type', 'galeryable_id', 'title', 'subtitle'
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function galleryable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the post's comments.
     */
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
