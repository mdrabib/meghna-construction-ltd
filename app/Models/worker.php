<?php

namespace App\Models;

use App\Models\Management\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class worker extends Model
{
    use HasFactory, SoftDeletes;

    public function teamLeader(){
        return $this->hasMany(Team::class,'team_leader','id');
    }

    public function worker(){
        return $this->hasMany(Team::class,'worker_id','id');
    }

    public function builderOption(){
        return $this->hasMany(Team::class,'builder_options_id','id');
    }
}
