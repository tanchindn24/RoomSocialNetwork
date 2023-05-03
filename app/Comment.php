<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Motelroom;
use App\User;

class Comment extends Model
{
    protected $table = 'comment';
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function motelroom() {
        return $this->belongsTo('App\Motelroom','room_id', 'id');
    }
}
