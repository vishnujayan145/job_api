<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\TaskJob;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = TaskJob::query();

        if ($request->has('title') && $request->has('location')) {
            $query->where('title', 'ilike', '%' . $request->title . '%')
                ->where('location', 'ilike', '%' . $request->location . '%');
        } elseif ($request->has('title')) {
            $query->where('title', 'ilike', '%' . $request->title . '%');
        } elseif ($request->has('location')) {
            $query->where('location', 'ilike', '%' . $request->location . '%');
        }

        return JobResource::collection($query->paginate(15));
    }
}
