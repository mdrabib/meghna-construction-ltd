<?php

namespace App\Models\Builder;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlatDetail extends Model
{
    use HasFactory,SoftDeletes;

    public function flat(){
        return $this->belongsTo(Flat::class);
    }

    public function client(){
        return $this->belongsTo(User::class);
    }

    public function totalBudget(){
        return $this->belongsTo(FloorBudgetDetails::class,'floor_budget_id','id');
    }
}
