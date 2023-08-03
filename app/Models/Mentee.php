<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    use HasFactory;
    protected $guarded = ['menteeID'];
    public function assessmentMenteeApplication()
    {
        return $this->hasOne(AssessmentMenteeApplication::class, 'menteeID', 'menteeID');
    }
    public function firstClass() {
        return $this->belongsTo(Classes::class, 'first_class', 'classID');
    }
    public function secondClass() {
        return $this->belongsTo(Classes::class, 'second_class', 'classID');
    }
}
