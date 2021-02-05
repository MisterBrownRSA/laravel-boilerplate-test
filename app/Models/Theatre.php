<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;

    protected $fillable = [
        'allocation',
        'cinema_id'
    ];

    public $timestamps = false;

    public function Cinema() {
        return $this->belongsTo(Cinema::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
    public function Showings() {
        return $this->hasMany(Showing::class);
    }
}
