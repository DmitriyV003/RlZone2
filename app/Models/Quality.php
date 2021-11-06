<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name'
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
