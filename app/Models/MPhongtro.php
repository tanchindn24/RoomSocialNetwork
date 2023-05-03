<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MPhongtro extends Model
{
    use HasFactory;
    protected $table = "tbl_phong";

    function nhatro() {
        return $this->belongsTo(MNhatro::class, 'nhatro_id', 'id');
    }
}
