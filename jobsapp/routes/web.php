<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;
use Illuminate\Http\Request;

// Home Route
Route::get('/', function () {
    return view('home');
});

// Route to display all job listings
Route::get('/jobs', function () {
    $jobs = JobListing::simplePaginate(3);
    return view('jobs.index', compact('jobs'));
})->name('jobs.index');

// Route to display the job creation form
Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');

// Route to handle the creation of a new job listing
Route::post('/jobs', function (Request $request) {
    $request->validate([
        'title' => 'required|string|min:5',
        'salary' => 'required|numeric',
    ]);

    JobListing::create([
        'title' => $request->input('title'),
        'salary' => $request->input('salary'),
        'employer_id' => 1, // Assuming a hardcoded employer ID
    ]);

    return redirect()->route('jobs.index');
})->name('jobs.store');

// Route to display a single job listing
Route::get('/jobs/{id}', function ($id) {
    $job = JobListing::find($id);
    if ($job) {
        return view('jobs.show', compact('job'));
    } else {
        abort(404, "Invalid job ID");
    }
})->where('id', '[0-9]+')->name('jobs.show');


// Route to display the job edit form
Route::get('/jobs/{id}/edit', function ($id) {
    $job = JobListing::find($id);
    if ($job) {
        return view('jobs.edit', compact('job'));
    } else {
        abort(404, "Invalid job ID");
    }
})->where('id', '[0-9]+')->name('jobs.edit');


// Route to handle the update of an existing job listing
Route::put('/jobs/{id}', function (Request $request, $id) {
    // Validate request data
    $request->validate([
        'title' => 'required|string|min:10',
        'salary' => 'required|numeric',
    ]);

    $job = JobListing::find($id);
    if ($job) {
        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
        ]);

        return redirect()->route('jobs.show', $job->id); // Redirect to the updated job listing
    } else {
        abort(404, "Invalid job ID");
    }
})->where('id', '[0-9]+')->name('jobs.update');

// Route to handle the deletion of a job listing
Route::delete('/jobs/{id}', function ($id) {
    $job = JobListing::find($id);
    if ($job) {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully.');
    } else {
        abort(404, "Invalid job ID");
    }
})->where('id', '[0-9]+')->name('jobs.destroy');

// Route to add a contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
