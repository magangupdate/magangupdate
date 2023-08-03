<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    // Guarded field which could not fill 
    protected $guarded = ['id'];

    // Relational to get data article's trackings
    public function trackings()
    {
        return $this->hasMany(TrackingAnalytic::class);
    }

    // Relational to get data article's likes
    public function likes()
    {
        return $this->hasMany(LikedArticle::class, 'article_id');
    }

    // Relational to get data article's saves
    public function saves()
    {
        return $this->hasMany(SavedArticle::class, 'article_id');
    }
}
