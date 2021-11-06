<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemWithdrawRequest extends Model
{
    use HasFactory, SoftDeletes;

    public const CREATED_STATUS = 'created';
    public const IN_PROCESS_STATUS = 'processing';
    public const REJECTED_STATUS = 'rejected';
    public const ACCEPTED_STATUS = 'accepted';

    public const STATUSES = [
      self::CREATED_STATUS,
      self::IN_PROCESS_STATUS,
      self::REJECTED_STATUS,
      self::ACCEPTED_STATUS,
    ];
}
