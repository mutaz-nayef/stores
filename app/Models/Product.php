<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category', 'subcategory']; // this for decrease the sql query more  performance


    public function scopeFilter($query, array $filters)
    {
        // $query->when(
        //     $filters['search'] ?? false,
        //     fn ($query, $search) => $query->where(fn ($query) => $query->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%'))
        // );

        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('name', $category)));

        $query->when($filters['subcategory'] ?? false, fn ($query, $subcategory) => $query->whereHas('author', fn ($query) => $query->where('name', $subcategory)));
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function subProduct()
    {
        return $this->hasMany(SubProduct::class);
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
