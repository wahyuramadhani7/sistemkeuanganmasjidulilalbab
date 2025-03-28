<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'type',
        'category',
        'date',
    ];

    protected $casts = [
        'amount' => 'integer',
        'date' => 'date',
    ];
}