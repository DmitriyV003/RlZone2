<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CraftAttempt extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function itemModification()
    {
        return $this->belongsTo(ItemModification::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
