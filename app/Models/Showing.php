<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showing extends Model
{
    use HasFactory;

    protected $fillable = [
        "reference",
        "film_id",
        "theatre_id",
        "bookinsgs"
    ];

    protected $dates = ['showing_at'];
}
