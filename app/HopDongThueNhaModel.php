<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HopDongThueNhaModel extends Model

{
    protected $table = "hopdong";

    public function chutro() {
        return $this->belongsTo('App\User', 'chutro_id', 'id');
    }
    public function phongtro()
    {
        return $this->belongsTo('App\PhongTroModel', 'phong_id', 'id');
    }
    public function khachthuethunhat()
    {
        return $this->belongsTo('App\KhachThueModel','khachthue_id', 'id');
    }
    public function khachthuethuhai()
    {
        return $this->belongsTo('App\KhachThueModel','khachthue_id_thuhai', 'id');
    }
    public function khachthuethuba()
    {
        return $this->belongsTo('App\KhachThueModel','khachthue_id_thuba', 'id');
    }
    public function khachthuethutu()
    {
        return $this->belongsTo('App\KhachThueModel','khachthue_id_thutu', 'id');
    }
    public function thanhtoan() 
    {
        return $this->belongsTo('App\ThanhToanModel', 'thanhtoan_id', 'id');
    }
    public function dientro()
    {
        return $this->hasMany('App\DienModel', 'hopdong_id', 'id');
    }
    
}
