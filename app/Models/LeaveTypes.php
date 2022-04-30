<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveTypes extends Model
{
    use HasFactory;
    protected $table = 'leave_types';
    protected $fillable=['leave_type','status'];

    public function leaves()
    {
        return $this->hasMany(Leaves::class);
    }
}
