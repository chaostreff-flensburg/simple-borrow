<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_date',
        'transaction_type',
        'item_id',
        'note',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
