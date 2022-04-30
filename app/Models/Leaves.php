<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $fillable=['leave_type_id', 'user_id', 'start_date', 'end_date', 'start_half_type','end_half_type', 'no_of_days', 'reason', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveTypes::class);
    }

}
