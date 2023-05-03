<?php

namespace App\Models;

use App\Models\MBaiviet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDanhmuc extends Model
{
    use HasFactory;
    protected $table = "tbl_danhmuc_baiviet";

    public function baiviet() {
        return $this->hasMany(MBaiviet::class, 'danhmuc_id', 'id');
    }

}
