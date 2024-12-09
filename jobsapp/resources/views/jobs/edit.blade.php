<x-layout title="Jobs" heading="Edit {{ $job['title'] }}">
    <div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg shadow-md">

        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Specify this as a PUT request -->

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-500" required value="{{ $job['title'] }}">
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">Job salary</label>
                <input type="text" name="salary" id="salary" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-500" required value="${{ $job['salary'] }}">
            </div>

            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none">
                Update
            </button>

            <!-- Cancel Button -->
            <a href="{{ route('jobs.show', $job->id) }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-300 hover:bg-gray-200 focus:outline-none">
                Cancel
            </a>
        </form>

        <!-- Delete Form -->
        <div class="mt-6 flex justify-between">
            <form id="delete-form" action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE') <!-- Add this for DELETE method -->
                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-500 focus:outline-none">
                    Delete Job Listing
                </button>
            </form>
        </div>
    </div>
</x-layout>
