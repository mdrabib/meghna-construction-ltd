<?php

namespace App\Models\Projects;

use App\Models\Builder\Budget;
use App\Models\Builder\Design;
use App\Models\Builder\BudgetDetails;
use App\Models\Builder\TestDetail;
use App\Models\Lands\Document;
use App\Models\Lands\Land;
use App\Models\Management\Management;
use App\Models\Projects\Stage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory,SoftDeletes;

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function land(){
        return $this->hasMany(Land::class,'project_id');
    }

    public function design(){
        return $this->hasMany(Design::class);
    }

    public function testDetails(){
        return $this->hasMany(TestDetail::class,'project_id','id');
    }
    
    public function management(){
        return $this->hasMany(Management::class,'project_id','id');
    }

    public function document(){
        return $this->hasMany(Document::class,'project_id','id');
    }

    public function budgets(){
        return $this->hasMany(Budget::class,'project_id');
    }

    public function budgetDetails(){
        return $this->hasManyThrough(BudgetDetails::class, Budget::class,'project_id','budget_id','id','id');
    }

  
}


