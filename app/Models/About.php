<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_date',
        'to_date',
        'education_name',
        'place',
        'description',
        '_token', // Add _token to the fillable array
    ];
}
