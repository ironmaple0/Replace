<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{

    protected $fillable = ['address', 'number', 'size', 'term','Start_date',
    'picture_id','memo','status','partner_id'];


    public function picture() {
        return $this->belongsTo('App\Picture', 'picture_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function chat() {
        return $this->hasmany('App\Chat');
    }
}
