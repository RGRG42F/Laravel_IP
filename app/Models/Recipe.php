<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'rating',
        'servings',
        'cook_time',
        'ingredients',
        'steps',
        'user_id',
        'category_id',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy("created_at");
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(RecipeRating::class);
    }
}
