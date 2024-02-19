<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->paginate(9);

        return response()->json([
            'status' => true,
            'results' => $projects
        ]);
    }

    public function show(string $slug) {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json($project);
    }
}
