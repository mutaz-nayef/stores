<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subProducts()
    {
        return $this->hasMany(SubProduct::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
