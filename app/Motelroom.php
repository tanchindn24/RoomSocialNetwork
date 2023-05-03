<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\User;
use App\Comment;
use App\Bookmask;

class Motelroom extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = "motelrooms";
    public function category()
    {
    	return $this->belongsTo('App\Categories','category_id','id');
    }
    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function district()
    {
    	return $this->belongsTo('App\District','district_id','id');
    }
    public function post()
    {
        return $this->hasMany('App\Motelroom', 'postmotelroom_id', 'id');
    }
    public function reports()
    {
        return $this->hasMany('App\Reports','id_motelroom','id');
    }
    public function bookmasks()
    {
        return $this->hasMany(Bookmask::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Comment', 'room_id', 'id');
    }
    public function request() 
    {
        return $this->hasMany('App\Request', 'id_motelroom', 'id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
