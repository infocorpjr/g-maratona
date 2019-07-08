<?php

namespace App\Models;

use App\User;
use App\Models\Marathon;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'marathon_id', 'name', 'description', 'validated'
    ];

    /**
     * Obtém o usuário pertencente a este time.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtém a maratona pertencente a este time.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marathon()
    {
        return $this->belongsTo(Marathon::class);
    }
}
