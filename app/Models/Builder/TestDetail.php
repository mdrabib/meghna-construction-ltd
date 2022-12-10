<?php

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Projects\Project;

class TestDetail extends Model
{
    use HasFactory, SoftDeletes;

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
