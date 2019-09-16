<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function customers(Type $var = null)
    {
        return $this->hasMany(Customer::class);
    }
}
