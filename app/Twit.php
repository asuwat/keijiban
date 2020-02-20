<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twit extends Model
{
    protected $fillable = [
        'body','updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
