<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TamTruTamVangModel extends Model
{
    protected $table = "tamtru_tamvang";

    public function chutro()
    {
        return $this->belongsTo('App\User', 'chutro_id', 'id');
    }
    public function khachthue()
    {
        return $this->belongsTo('App\KhachThueModel','khachthue_id', 'id');
    }
    public function matinhthanhpho()
    {
        return $this->belongsTo('App\TinhThanhPho','tinhthanh', 'matp');
    }
    public function maquanhuyen()
    {
        return $this->belongsTo('App\QuanHuyen','quanhuyen', 'maqh');
    }
    public function maxaphuong()
    {
        return $this->belongsTo('App\XaPhuongThiTran','xaphuong', 'xaid');
    }
}
