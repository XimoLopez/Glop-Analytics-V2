<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'registration',
    ];

    protected $dates = [
        'registration',
    ];

    protected $casts = [
        'registration' => 'datetime'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class)->where('status', 'entregado');
    }

    public function getTotalSpentAttribute()
    {
        return $this->orders()->sum('value');
    }

}
