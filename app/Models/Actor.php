<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_administrator', 'is_technician', 'is_participant', 'is_voluntary'
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
        'is_design' => 'boolean',
        'is_player' => 'boolean',
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