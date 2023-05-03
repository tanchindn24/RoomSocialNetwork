<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table = "quanhuyen";

    public function thanhpho()
    {
        return $this->belongsTo('App\Models\TinhThanhPho', 'matp', 'matp');
    }
}
