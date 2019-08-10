<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'team_id', 'name', 'course', 'shirt_size', 'rga', 'birthday'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'team_id' => 'integer'
    ];

    /**
     * Set the matathon's date.
     *
     * @param $value
     * @return void
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value)
            ->format('Y-m-d H:i');
    }

    /**
     * Get the marathon's date.
     *
     * @param string $value
     * @return Carbon
     */
    public function getDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * Obtém o usuário pertencente a este participante.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtém o time pertencente a este participante.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
