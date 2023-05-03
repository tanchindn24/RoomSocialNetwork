<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongTroModel extends Model
{
    protected $table = "phongtro";

    public function chutro()
    {
        return $this->belongsTo('App\User', 'chutro_id', 'id');
    }

    public function loaiphongtro()
    {
        return $this->belongsTo('App\LoaiphongModel', 'loaiphong_id', 'id');
    }

    public function tinhtrang()
    {
        return $this->belongsTo('App\TinhtrangPhongModel', 'tinhtrang_id', 'id');
    }
}
