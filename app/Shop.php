<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image', 'address', 'lat', 'lng'];

    public function listprefrredshops()
    {
        return $this->hasMany(Listprefrredshop::class);
    }
}
