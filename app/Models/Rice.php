<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rice extends Model
{
    protected $table = 'rices';
    protected $fillable = ['name', 'price', 'stock', 'description'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
