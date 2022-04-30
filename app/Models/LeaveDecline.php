<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveDecline extends Model
{
    use HasFactory;
    protected $table = 'leave_decline_request';
    protected $fillable=['leave_id', 'reason', 'status'];
}
