<?php

namespace App\Models\Management;

use App\Models\Auth\User;
use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Management extends Model
{
    use HasFactory,SoftDeletes;

    public function projectName(){
        return $this->belongsTo(Project::class);
    }

    public function director(){
        return $this->belongsTo(User::class,'project_director','id');
    }

    public function architecht(){
        return $this->belongsTo(User::class,'architecture','id');
    }
    public function civilengineer(){
        return $this->belongsTo(User::class,'architecture','id');
    }
    public function team(){
        return $this->hasMany(Team::class,'management_id','id');
    }

}
