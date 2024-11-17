<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory; // Use the HasFactory trait

    // Define the relationship with JobListing

    public function jobListings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(JobListing::class);
    }

}
