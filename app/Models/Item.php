<?php

namespace App\Models;

use App\Traits\AutoLoginLinkTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use AutoLoginLinkTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'borrow_state',
        'image',
        'included',
        'manual_link',
        'require_training',
        'storage_location_id',
        'approved',
        'price',
    ];

    protected $casts = [
        'require_training' => 'boolean',
        'approved' => 'boolean',
    ];

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function storageLocation(): BelongsTo
    {
        return $this->belongsTo(StorageLocation::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'item_tag', 'item_id', 'tag_id');
    }

    protected function getRouteName(): string
    {
        return 'item.show';
    }
}
