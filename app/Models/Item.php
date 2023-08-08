<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'borrow_state',
        'image',
        'included',
        'manual_link',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function getAutoLoginLink(): string
    {
        return str_replace('://', '://' . config('app.autoLoginCredentials') . '@', route('item.show', $this->id));
    }
}
