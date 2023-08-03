<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function class()
    {
        return $this->hasOne(Classes::class, 'mentorID', 'id');
    }
}
