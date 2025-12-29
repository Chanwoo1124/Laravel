<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FoodType extends Model
{
    /** @use HasFactory<\Database\Factories\FoodTypeFactory> */
    use HasFactory;

    protected $primaryKey = 'name';
    public $incrementing =false;
    protected $keyType = 'string';
    protected $guarded = [];
    
    public function food(): HasMany
    {
        // このFoodTypeモデルに関連する複数のFoodモデルを取得する関係を定義します。
        // 'food_type_name'は、Foodモデル側の外部キーです。
        // 'name'は、FoodTypeモデル側の主キーです。
        return $this->hasMany(Food::class, 'food_type_name', 'name');
    }

}
