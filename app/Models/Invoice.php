<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    protected $fillable = [
        'user_id',
        'kiosk_id',
        'invoice_date',
        'total_amount',
        'total_paid',
        'total_balance',
        'reference_number',
        'payment_method',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function kiosk()
    {
        return $this->belongsTo('App\Models\Kiosk', 'kiosk_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
