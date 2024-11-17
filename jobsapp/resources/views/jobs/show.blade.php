<x-layout>
    <x-slot:heading>
        Job Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>This job pays ${{ $job['salary'] }}</p>

    <!-- Edit Button -->
    <x-button href="{{ route('jobs.edit', $job->id) }}">Edit</x-button>

    <!-- Button to go back to the job listings -->
    <a href="{{ route('jobs.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-500 focus:outline-none mt-4">
        Back to Job Listings
    </a>
</x-layout>
