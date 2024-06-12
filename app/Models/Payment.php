<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    const PENDING_STATUS = 'pending';
    const SUCCESS_STATUS = 'success';
    protected $fillable = [
        'user_id',
        'plan_id',
        'plan_price',
        'plan_data',
        'payment_data',
        'note',
        'status'
    ];

    protected $casts = [
      'plan_data' => 'array',
      'payment_data' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
