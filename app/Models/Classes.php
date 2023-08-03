<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $guarded = ['classID'];
    public function mentor() 
    {
        return $this->belongsTo(Mentor::class, 'mentorID', 'id');
    }
    public function menteeOnFirstClass()
    {
        return $this->hasMany(Mentee::class, 'first_class', 'classID');
    }
    public function menteeOnSecondClass()
    {
        return $this->hasMany(Mentee::class, 'second_class', 'classID');
    }
}
