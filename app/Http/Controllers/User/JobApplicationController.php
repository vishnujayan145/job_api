<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobApplicationResource;
use App\Models\TaskJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{

    public function store(Request $request, $job)
    {
        $job = TaskJob::findOrFail($job);
        $currentUserId = Auth::id();

        $application = $request->user()->applications()->create([
            'user_id' => $currentUserId,
            'task_job_id' => $job->id,
        ]);

        return new JobApplicationResource($application);
    }

    use AuthorizesRequests;

    public function index(TaskJob $job)
    {

        $this->authorize('view', $job);

        $applications = $job->applications()->with('taskjob', 'user')->get();
    
        if ($applications->isEmpty()) {
            return response()->json(['message' => 'No applications found for this job.'], 404);
        }
    
        return JobApplicationResource::collection($applications);
    }
}
