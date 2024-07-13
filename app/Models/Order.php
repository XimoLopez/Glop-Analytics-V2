<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Propiedades que se pueden asignar masivamente
    protected $fillable = [
        'client_id',
        'date',
        'quantity',
        'value',
        'status',
        'user_id',
    ];

    // Convertir la propiedad 'date' a una instancia de Carbon (manejo de fechas)
    protected $casts = [
        'date' => 'datetime',
    ];

    // Relación con el modelo Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
