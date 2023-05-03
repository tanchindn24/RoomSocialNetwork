<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DienBill extends Model
{
    protected $table = 'dienbill';

    public function phongchothue()
    {
        return $this->beLongsTo('App\PhongChoThueModel', 'khachthue_id', 'id');
    }
    public function khachthueone()
    {
        return $this->belongsTo('App\KhachThueModel', 'khachthue_id', 'id');
    }
}
