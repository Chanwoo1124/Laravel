<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function getTotalCalories(): float
    {
        return ($this->protein * 4) + ($this->carbs * 4) + ($this->fat * 9);
    }
}
