<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'chat_id', 'content'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    public function chat() {
        return $this->belongsTo('App\Chat','chat_id','id');
    }
}
