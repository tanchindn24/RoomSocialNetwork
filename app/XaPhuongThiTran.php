<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuongThiTran extends Model
{
    protected $table = "xaphuongthitran";

    public function quanhuyen()
    {
        return $this->belongsTo('App\Models\QuanHuyen', 'maqh', 'maqh');
    }
}
