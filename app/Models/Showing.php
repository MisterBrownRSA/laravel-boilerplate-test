<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showing extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        "reference",
        "film_id",
        "theatre_id",
    ];

    protected $casts = [
        'showing_at' => 'datetime'
    ];

    protected $appends = ['max_seats', 'available_seats'];

    private $max_seats = 30;

//  RELATIONSHIPS

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Theatre() {
        return $this->belongsTo(Theatre::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Film() {
        return $this->belongsTo(Film::class);
    }

    public function Bookings() {
        return $this->hasMany(Booking::class);
    }

//  MUTATORS

    public function getMaxSeatsAttribute($value) {
        return $this->max_seats;
    }

    public function getAvailableSeatsAttribute($value) {
        return $this->max_seats - $this->Bookings->where('status', 'booked')->count();
    }

    public function getShowingAtAttribute($value) {
        return $value;
    }
}
