<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NuocBill extends Model
{
    protected $table = 'nuocbill';

    public function phongchothue()
    {
        return $this->beLongsTo('App\PhongChoThueModel', 'khachthue_id', 'id');
    }
    public function khachthueone()
    {
        return $this->belongsTo('App\KhachThueModel', 'khachthue_id', 'id');
    }
}
