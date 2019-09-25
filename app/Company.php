<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Company extends Model
{
    protected $guarded = [];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
