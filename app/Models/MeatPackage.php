<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MeatPackage extends Model
{


    protected $fillable = [
        'title', 'slug', 'stock', 'type', 'price', 'about'
    ];

    protected $hidden =  [

    ];

    public function galleries(){
        return $this->hasMany(Gallery::class, 'meat_packages_id', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'meat_packages_id', 'id');
    }
}
