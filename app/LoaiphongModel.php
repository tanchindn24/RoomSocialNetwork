<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiphongModel extends Model
{
    protected $table = "loaiphong";

    public function chutro()
    {
        return $this->belongsTo('App\User', 'chutro_id', 'id');
    }
}
