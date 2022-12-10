<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Projects\Project;
use Illuminate\Http\Request;

class CommonProject extends Controller
{
    public function index(Project $project)
    {
        $projects = Project::paginate(10);
        //  print_r($project);
        return view('Projects.overview',compact('project'));
    }
}
