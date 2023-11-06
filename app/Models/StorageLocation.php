<?php

namespace App\Models;

use App\Traits\AutoLoginLinkTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StorageLocation extends Model
{
    use AutoLoginLinkTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'looseInventory',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    protected function getRouteName(): string
    {
        return 'storageLocation.show';
    }
}
