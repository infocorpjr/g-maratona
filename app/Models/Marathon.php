<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Image;
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
     * Get the marathon's date.
     *
     * @param string $value
     * @return int
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
}
