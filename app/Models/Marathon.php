<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Marathon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'starts', 'ends', 'date', 'team_count', 'team_members_count'
    ];

    /**
     * Set the matathon's starts.
     *
     * @param $value
     * @return void
     */
    public function setStartsAttribute($value)
    {
        $this->attributes['starts'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i');
    }

    /**
     * Set the matathon's ends.
     *
     * @param $value
     * @return void
     */
    public function setEndsAttribute($value)
    {
        $this->attributes['ends'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i');
    }

    /**
     * Set the matathon's date.
     *
     * @param $value
     * @return void
     */
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y H:i', $value)
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
     * Get the marathon's starts.
     *
     * @param string $value
     * @return Carbon
     */
    public function getStartsAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * Get the marathon's ends.
     *
     * @param string $value
     * @return Carbon
     */
    public function getEndsAttribute($value)
    {
        return Carbon::parse($value);
    }

    /**
     * Get the marathon's image.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get the marathon's teams.
     */
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Get the marathon's technicians.
     */
    public function technicians()
    {
        return $this->hasMany(Technician::class);
    }

    /**
     * Get the marathon's voluntaries.
     */
    public function voluntaries()
    {
        return $this->hasMany(Voluntary::class);
    }
}
