<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentMenteeApplication extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mentee()
    {
        return $this->belongsTo(Mentee::class, 'menteeID', 'menteeID');
    }
}
