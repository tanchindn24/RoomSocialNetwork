<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonModel extends Model
{
    protected $table = "hoadon";

    public function chutro()
    {
        return $this->belongsTo('App\User', 'chutro_id', 'id');
    }
    public function hopdong()
    {
        return $this->belongsTo('App\HopDongThueNhaModel', 'hopdong_id', 'id');
    }
}
