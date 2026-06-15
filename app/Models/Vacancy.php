<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'description',
        'deadline'
    ];
}