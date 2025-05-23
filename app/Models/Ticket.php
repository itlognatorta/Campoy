<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // If your table is named 'tickets', no need to specify $table

    // Mass assignable fields
    protected $fillable = [
        'violation_id',
        'violator_id',
        'ticket_number',
        'issue_date',
        'due_date',
        'fine_amount',
        'status',
    ];

    /**
     * Relationships
     */

    // Ticket belongs to a violation
    public function violation()
    {
        return $this->belongsTo(Violation::class, 'violation_id');
    }

    // Ticket belongs to a violator
    public function violator()
    {
        return $this->belongsTo(Violator::class, 'violator_id');
    }
}
