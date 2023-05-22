<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'slug', 'status'];

    public function Posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Posts::class, 'category_id', 'id');
    }
}
