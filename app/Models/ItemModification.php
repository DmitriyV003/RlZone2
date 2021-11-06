<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemModification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_id',
        'quality_id',
        'rarity_id',
        'price',
    ];

    protected $attributes = [
        'visible_for_user' => false,
    ];

    protected $casts = [
        'visible_for_user' => 'boolean',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function chests()
    {
        return $this->belongsToMany(Chest::class, 'item_modification_chest');
    }

    public function chestOpening()
    {
        return $this->hasMany(ChestOpening::class);
    }

    public function craftAttempt()
    {
        return $this->hasMany(CraftAttempt::class);
    }
}
