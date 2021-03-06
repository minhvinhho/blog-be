<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = true;
    protected $fillable = ['name', 'email', 'salary'];
}
