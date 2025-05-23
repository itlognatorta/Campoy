<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleStatus extends Model
{
    use HasFactory;

    // Table name if it differs from 'role_statuses'
    protected $table = 'role_status';

    // Fields that are mass assignable
    protected $fillable = [
        'user_id',
        'role_name',
    ];

    /**
     * RoleStatus belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
