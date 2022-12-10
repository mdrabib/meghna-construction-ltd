<?php

namespace App\Models\Management;

use App\Models\worker;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory,SoftDeletes;

    public function teamLeader(){
        return $this->belongsTo(worker::class,'team_leader','id');
    }
}
