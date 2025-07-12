<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donut extends Model
{
    use HasFactory;

    protected $fillable = ['donut_id', 'name', 'type', 'ppu'];

    public function batters()
    {
        return $this->hasMany(Batter::class, 'donut_id');
    }

    public function toppings()
    {
        return $this->hasMany(Topping::class, 'donut_id');
    }
}
