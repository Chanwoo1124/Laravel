<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Food extends Model
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function foodType(): BelongsTo{
        // このメソッドは、FoodモデルがFoodTypeモデルに属していることを示します。
        // 'food_type_name'は、Foodテーブル内でFoodTypeモデルの主キーを参照する外部キーです。
        // 'name'は、FoodTypeモデルの主キーのカラム名です。
        // 通常、主キーは'id'ですが、ここでは'name'を主キーとして使っています。
        return $this->belongsTo(FoodType::class, 'food_type_name', 'name');
    }
      public function foodTags(): belongsToMany{
        return $this->belongsToMany(FoodTag::class)->withTimestamps();
    }


    public function getTotalCalories(): float
    {
        return ($this->protein * 4) + ($this->carbs * 4) + ($this->fat * 9);
    }
}
