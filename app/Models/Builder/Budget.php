<?php

namespace App\Models\Builder;

use App\Models\Projects\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Budget extends Model
{
    use HasFactory,SoftDeletes;

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function floorDetail(){
        return $this->belongsTo(FloorDetails::class,'floor_id','id');
    }

    public function foundation(){
        return $this->belongsTo(Foundation::class);
    }

    public function budgetDetails(){
        return $this->belongsToMany(BudgetDetails::class);
    }
}
