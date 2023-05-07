<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory, HasUuids;

    protected $table = "posts";

    public function bltCategory()
    {
        return $this->belongsTo(PostCategories::class, 'category_id', 'id');
    }

    public function bltUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
