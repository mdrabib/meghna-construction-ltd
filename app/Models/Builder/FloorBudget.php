<?php

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FloorBudget extends Model
{
    use HasFactory,SoftDeletes;

    public function floorDetail(){
        return $this->belongsTo(FloorDetails::class,'floor_details_id','id');
    }
}
