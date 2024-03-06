<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $table = 'menus';

    protected $fillable = [
        'name',
        'decription',
        'price',
        'category',
        'quantity',
        'image',
        'created_by',
        'kiosk',
    ];

    public function kioskk()
    {
        return $this->belongsTo('App\Models\Kiosk', 'kiosk');
    }

    public function favourite()
    {
        return $this->hasMany('App\Models\Favourite');
    }

}
