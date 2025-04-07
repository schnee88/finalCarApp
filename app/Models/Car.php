<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Car.php
class Car extends Model
{
    use HasFactory;

    protected $fillable = ['make', 'model', 'registration_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orderedParts()
    {
        return $this->hasMany(OrderedPart::class);
    }
}

