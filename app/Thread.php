<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function addReply(Reply $reply)
    {
        $this->replies()->save($reply);
    }
}
