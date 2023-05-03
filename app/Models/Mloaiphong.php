<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MNhatro;

class Mloaiphong extends Model
{
    use HasFactory;

    protected $table = "tbl_loaiphong";

    public function nhatro() {
        return $this->hasMany(MNhatro::class, 'loaiphong_id', 'id');
    }
}
