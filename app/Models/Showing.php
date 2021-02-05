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
        "bookinsgs"
    ];

    protected $dates = ['showing_at'];

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
}
