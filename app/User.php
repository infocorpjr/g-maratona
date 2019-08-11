<?php

namespace App;

use App\Models\Actor;
use App\Models\Participant;
use App\Models\Profile;
use App\Models\Team;
use App\Models\Technician;
use App\Models\Voluntary;
use App\Notifications\VerifyEmailQueued;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailQueued());
    }


    /**
     * Obtém o ator atribuído a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function actor()
    {
        return $this->hasOne(Actor::class);
    }

    /**
     * Obtém os times pertencente a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Obtém os perfil de de participante a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participant()
    {
        return $this->hasOne(Participant::class);
    }

    /**
     * Obtém os perfil voluntario pertencente a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function voluntarie()
    {
        return $this->hasOne(Voluntary::class);
    }

    /**
     * Obtém o perfil de tecnico a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function technician()
    {
        return $this->hasOne(Technician::class);
    }

    /**
     * Obtém os perfil pertencente a este usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
