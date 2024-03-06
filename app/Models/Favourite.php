<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'user_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
