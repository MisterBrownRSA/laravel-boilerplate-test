<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'reference',
        'user_id',
        'showing_id',
        'status'
    ];

    public function Owner() {
        return $this->belongsTo(User::class);
    }

    public function Showing() {
        return $this->belongsTo(Showing::class);
    }
}
