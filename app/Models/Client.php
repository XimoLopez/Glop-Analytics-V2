<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Clase Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $registration
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read float $total_spent
 */
class Client extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar de manera masiva.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'registration',
    ];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'registration' => 'datetime',
    ];

    /**
     * Obtener los pedidos del cliente.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Obtener el total gastado por el cliente.
     *
     * @return float
     */
    public function getTotalSpentAttribute()
    {
        return $this->orders()->sum('value') ?? 0; 
    }
}
