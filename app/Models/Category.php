<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'sort_order',
        'is_active',
        'meta_title',
        'meta_description',
        'parent_id',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order');
    }

    public function scopeMainCategories(Builder $query)
    {
        $query->whereNull('parent_id');
    }

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => Str::slug($value ?? $this->attributes['name']),
        );
    }

    protected static function booted(): void
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('is_active', true);
        });
    }
}
