<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobListing;

class JobListingPolicy
{
    /**
     * Determine if the given job listing can be edited by the user.
     */
    public function edit(User $user, JobListing $job)
    {
        return $job->employer && $user->id === $job->employer->user_id;
    }

    public function delete(User $user, JobListing $job)
    {
        return $job->employer && $user->id === $job->employer->user_id;
    }
}
