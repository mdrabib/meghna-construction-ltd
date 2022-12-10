<?php

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FloorDetails extends Model
{
    use HasFactory,SoftDeletes;

    // public function floorDetails(){
    //     return $this->hasMany(FloorDetails::class);
    // }
}
