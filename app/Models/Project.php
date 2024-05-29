<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'developedYear',
        'projectName',
        'projectType',
        'projectDesc',
        'linkProject',
    ];

    protected $table = 'project';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function pictures(){
        return $this->hasMany(Pictures::class);
    }
}
