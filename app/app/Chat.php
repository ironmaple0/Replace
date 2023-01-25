<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $table = 'chats';

    protected $fillable = [
        'parking_id','sender_id','receiver_id'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function comment() {
        return $this->hasmany('App\Comment');
    }

    public function parking() {
        return $this->belongsTo('App\Parking','parking_id','id');
    }
}
