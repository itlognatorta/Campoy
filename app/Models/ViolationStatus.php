<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViolationStatus extends Model
{
    use HasFactory;

    // Table name if it doesn't follow Laravel's pluralization
    protected $table = 'violation_status';

    protected $fillable = [
        'violation_id',
        'status',
        'remarks',
    ];

    /**
     * Relationship to Violation
     */
    public function violation()
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }
}
