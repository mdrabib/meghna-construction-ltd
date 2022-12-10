<?php

namespace App\Models\Lands;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
