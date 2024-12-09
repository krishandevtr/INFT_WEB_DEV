<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class JobListingController extends Controller
{
    public function index() {
        $jobs = JobListing::simplePaginate(3);
        return view('jobs.index', compact('jobs'));
    }

    public function create() {
        return view('jobs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|min:5',
            'salary' => 'required|numeric',
        ]);

        JobListing::create([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'employer_id' => auth()->id(), // Use the logged-in user's ID
        ]);

        return redirect()->route('jobs.index');
    }

    public function show(JobListing $job) {
        // Eager load the employer relationship
        $job->load('employer');

        return view('jobs.show', compact('job'));
    }
    public function edit($id)
    {
        // Find the job listing or fail
        $job = JobListing::findOrFail($id);

        // Check if the authenticated user is the employer of the job
        if (auth()->user()->id !== $job->employer->user_id) {
            abort(403); // Abort with a 403 Forbidden error if not authorized
        }

        // Return the edit view with the job
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job) {
        // Validate the request
        $request->validate([
            'title' => 'required|string|min:10',
            'salary' => 'required|numeric',
        ]);

        // Authorize the user to update the job
        $this->authorize('edit', $job);

        // Update the job
        $job->update($request->only('title', 'salary'));
        return redirect()->route('jobs.show', $job->id);
    }

    public function destroy(JobListing $job) {
        // Authorize the user to delete the job
        $this->authorize('edit', $job);

        // Delete the job
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully.');
    }
}
