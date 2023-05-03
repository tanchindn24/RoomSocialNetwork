<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class MBaiviet extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = "tbl_baiviet";

    public function chutro()
    {
        return $this->belongsTo('App\Models\User', 'chutro_id', 'id');
    }
    public function danhmuc()
    {
        return $this->belongsTo('App\Models\MDanhmuc', 'danhmuc_id', 'id');
    }
    public function Sluggable():array
    {
        return [
            'slug'=> [
                'source'=>'tieu_de'
            ]
        ];
    }
}
