<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violator extends Model
{
    use HasFactory;

    // Table name if it's not the plural form "violators"
    // protected $table = 'violators';

    protected $fillable = [
        'user_id',
        'license_number',
        'birthdate',
        'gender',
        'occupation',
        'contact_number',
        'address',
    ];

    /**
     * Each violator belongs to one user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Violator can have many tickets
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
