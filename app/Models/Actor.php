<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'is_administrator', 'is_technician', 'is_voluntary', 'is_participant',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_administrator' => 'boolean',
        'is_technician' => 'boolean',
        'is_voluntary' => 'boolean',
        'is_participant' => 'boolean',
    ];

    /**
     * Obtém o usuário pertencente a este ator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
