<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, HasUuids;

    protected $table = "room";

    protected $fillable = [
        'number_room',
        'user_id',
        'house_id',
        'numerical_order',
        'price',
        'height',
        'width',
        'maximum_number_of_people',
        'rent_with',
        'description',
    ];
}
