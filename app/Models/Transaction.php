<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    public const AVAILABLE = 0;

    public const BORROWED = 1;

    protected $fillable = [
        'return_date',
        'transaction_type',
        'item_id',
        'note',
        'email',
        'name',
    ];

    protected $casts = [
        'return_date' => 'date',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
