<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['picture_url'];

    public function parking() {
        return $this->hasmany('App\Parking');
    }
}
