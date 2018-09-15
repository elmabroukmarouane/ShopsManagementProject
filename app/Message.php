<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'message'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
