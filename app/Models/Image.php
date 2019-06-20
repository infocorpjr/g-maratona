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
        'path', 'imageable_id', 'imageable_type'
    ];

    /**
     * Outros atributos customizados.
     *
     * @var array
     */
    protected $attributes = [
        'url' => ''
    ];

    /**
     * Get the image's url.
     *
     * @param string $value
     * @return void
     */
    public function getUrlAttribute($value)
    {
        return asset('storage/' . $this->path);
    }

    /**
     * Get all of the owning imageable models.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
