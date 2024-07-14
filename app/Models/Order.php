<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'quantity',
        'value',
        'status',
        'user_id',
    ];

    protected $dates = [
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
