<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    use HasFactory;

    // Specify primary key if it's not 'id'
    protected $primaryKey = 'violation_id';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'vehicle_plate_number',
        'violation_type',
        'location',
        'date_time',
    ];

    // If your primary key is not an incrementing integer, specify this
    // protected $keyType = 'int'; // default
    // public $incrementing = true; // default

    /**
     * Relationships
     */

    // Violation belongs to a user (driver)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Violation can have many tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'violation_id');
    }

    // Optionally, violation status relationship if you want to separate status tracking
    public function violationStatus()
    {
        return $this->hasOne(ViolationStatus::class, 'violation_id');
    }
}
