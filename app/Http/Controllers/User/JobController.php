<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\TaskJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return JobResource::collection(TaskJob::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
        ]);

        $job = $request->user()->jobs()->create($validated);

        return new JobResource($job);
    }

    public function show(TaskJob $job)
    {
        return new JobResource($job);
    }

    public function update(Request $request, TaskJob $job)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'company' => 'string|max:255',
            'location' => 'string|max:255',
            'salary' => 'numeric',
        ]);

        $job->update($validated);

        return new JobResource($job);
    }

    public function destroy(TaskJob $job)
    {
        $job->delete();

        return response()->json(['message' => 'Job deleted']);
    }
}
