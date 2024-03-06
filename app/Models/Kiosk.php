<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{
    use HasFactory;

    protected $table = 'kiosks';

    protected $fillable = [
        'name',
        'address',
        'description',
        'opening_day',
        'opening_time',
        'closing_time',
        'category',
        'phone_num',
        'status',
        'image',
        'owner',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function menu()
    {
        return $this->hasMany('App\Models\Menu');
    }
}

