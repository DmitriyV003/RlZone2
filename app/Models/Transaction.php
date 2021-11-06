<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public const WITHDRAW_TYPE = 'withdraw';
    public const REPLENISHMENT_TYPE = 'replenishment';

    public const TYPES = [
        self::WITHDRAW_TYPE,
        self::REPLENISHMENT_TYPE,
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
