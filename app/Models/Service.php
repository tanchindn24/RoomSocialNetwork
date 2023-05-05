<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasUuids;

    protected $table = "service";

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'status',
        'note',
    ];

    public function belongsToServiceCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceCategories::class, 'category_id', 'id');
    }
}
