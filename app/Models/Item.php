<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
      'name',
      'description',
      'image'
    ];

    public function craftItems()
    {
        return $this->belongsToMany(CraftItem::class, 'item_characteristics_chest');
    }

    public function chestItems()
    {
        return $this->belongsToMany(ChestItem::class, 'item_characteristics_chest');
    }
}
