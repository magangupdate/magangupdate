<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingAnalyticProgram extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function programs() {
        return $this->belongsTo(Program::class, 'event_id');
    }
}