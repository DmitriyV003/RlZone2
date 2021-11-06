<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function itemModification()
    {
        return $this->belongsToMany(ItemModification::class, 'item_modification_chest');
    }
}
