<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = ['donut_id', 'topping_id', 'type'];

    public function donut() {
        return $this->belongsTo(Donut::class);
    }


}
