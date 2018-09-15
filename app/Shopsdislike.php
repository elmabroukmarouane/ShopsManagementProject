<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopsdislike extends Model
{
    protected $table = 'shopsdislikes';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'shop_id', 'show_datetime'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->belongsTo(Shop::class);
    }
}
