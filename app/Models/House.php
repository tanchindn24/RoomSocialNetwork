<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property integer $province_code
 * @property integer $district_code
 * @property integer $ward_code
 * @property string $address
 * @package App\Models
 */
class House extends Model
{
    use HasFactory,HasUuids;

    protected $table = "house";

    protected $fillable = [
        'name',
        'user_id',
        'province_code',
        'district_code',
        'ward_code',
        'address',
    ];
}
