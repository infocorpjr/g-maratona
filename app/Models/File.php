<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'subtitle', 'file_path', 'extension', 'file_size'
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}
