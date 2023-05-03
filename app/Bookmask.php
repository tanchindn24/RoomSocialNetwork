<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Motelroom;

class Bookmask extends Model
{
    protected $table = 'bookmask';

    public function post() {
        return $this->belongsTo(Motelroom::class);
    }
}
