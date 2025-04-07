<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/OrderedPart.php
class OrderedPart extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'notes'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

