<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastManager = static::orderBy('manager_number', 'desc')->first();

            if ($lastManager) {
                $managerNumber = str_pad(++$lastManager->manager_number, 8, '0', STR_PAD_LEFT);
            } else {
                $managerNumber = str_pad(1, 8, '0', STR_PAD_LEFT);
            }

            $model->manager_number = $managerNumber;
        });
    }


    public function getByJobNumber($managerNumber)
    {
        return static::where('manager_number', $managerNumber)->first();
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store-management');
    }
}
