<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // User.php
    public function educations()
    {
        return $this->hasMany(Educations::class);
    }
    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function award()
    {
        return $this->hasMany(Award::class);
    }


}
