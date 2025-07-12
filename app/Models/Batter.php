<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batter extends Model
{
    use HasFactory;

    protected $fillable = ['donut_id', 'batter_id', 'type'];

    public function donut() {
        return $this->belongsTo(Donut::class);
    }


}
