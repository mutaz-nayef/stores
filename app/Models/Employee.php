<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static $lastEmployeeNumber = 0;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $employeeNumber = str_pad(++static::$lastEmployeeNumber, 8, '0', STR_PAD_LEFT);

            $model->employee_number = $employeeNumber;
        });
    }
    public function getByJobNumber($employeeNumber)
    {
        return static::where('employee_number', $employeeNumber)->first();
    }


    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
