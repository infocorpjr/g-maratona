<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Voluntary extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'marathon_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'marathon_id' => 'integer'
    ];

    /**
     * Obtém o usuário pertencente a este voluntário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtém a maratona pertencente a este voluntário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marathon()
    {
        return $this->belongsTo(Marathon::class);
    }
}
