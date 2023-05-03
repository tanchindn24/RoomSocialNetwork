<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhToanModel extends Model
{
    protected $table = "thanhtoan";

    public function hopdong() 
    {
        return $this->hasMany('App\HopDongThueNhaModel', 'thanhtoan_id', 'id');
    }
}
