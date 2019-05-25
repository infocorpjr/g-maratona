<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'subtitle', 'body', 'author', 'capa_path', 'draft'
    ];

    /**
     * Get the Post Gallery.
     */
    public function gallery()
    {
        return $this->morphOne('App\Models\Gallery', 'galleryable');
    }
}
