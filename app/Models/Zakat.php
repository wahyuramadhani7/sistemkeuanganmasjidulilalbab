<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    protected $fillable = ['donor_name', 'type', 'amount', 'unit', 'date'];
}