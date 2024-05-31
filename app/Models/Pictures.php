<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pictures extends Model
{
    use HasFactory;
    protected $table = 'pictures';
    protected $fillable = ['project_id', 'picture', 'name_pic','mime','pin'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function award(){
        return $this->belongsTo(Award::class);
    }
}
