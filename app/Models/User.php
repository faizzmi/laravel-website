<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'name', // Add 'name' to the fillable array
        'email',
        'password',
    ];

    // User.php
    public function educations()
    {
        return $this->hasMany(Educations::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

}
