<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'second_name',
        'sex',
        'status',
        'latitude',
        'longitude',
        'date_of_birth',
        'date_of_death',
    ];
}
