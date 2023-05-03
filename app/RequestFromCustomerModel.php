<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Motelroom;

class RequestFromCustomerModel extends Model
{
    protected $table = 'requestfcustomer';

    public function user() {
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function motelroom() {
        return $this->belongsTo('App\Motelroom', 'id_motelroom', 'id');
    }
}
