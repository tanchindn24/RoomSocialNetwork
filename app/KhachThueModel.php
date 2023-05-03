<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachThueModel extends Model
{
    protected $table ="khachthue";

    public function chutro()
    {
        return $this->belongsTo('App\User','chutro_id', 'id');
    }
    
}
