<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'rga', 'siapi', 'cpf', 'avatar_url'
    ];

    /**
     * Obtém o usuário desse perfil
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marathon()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
