<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'imageable_type', 'imageable_id', 'path'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}

