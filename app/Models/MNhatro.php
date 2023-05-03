<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MNhatro extends Model
{
    use HasFactory;
    protected $table = 'tbl_nhatro';

    function chutro() {
        return $this->belongsTo(User::class,'chutro_id', 'id');
    }

    function loaiphong() {
        return $this->belongsTo(Mloaiphong::class, 'loaiphong_id', 'id');
    }
}
