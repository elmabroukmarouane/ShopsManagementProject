<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listprefrredshop extends Model
{
    protected $table = 'listprefrredshops';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'shop_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
