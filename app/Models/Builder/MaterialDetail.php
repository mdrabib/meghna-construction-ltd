<?php

namespace App\Models\Builder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialDetail extends Model
{
    use HasFactory,SoftDeletes;

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
