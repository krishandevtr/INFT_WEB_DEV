<x-layout title="Jobs" heading="Create Job Listing">
    <div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg shadow-md border border-black">

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc pl-5 text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 ">Job Title</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-black-300 border border-black rounded-md shadow-sm focus:ring focus:ring-green-500" required value="{{ old('title') }}">
            </div>

            <div class="mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                <input type="number" name="salary" id="salary" class="mt-1 block w-full border-black-300 border border-black rounded-md shadow-sm focus:ring focus:ring-green-500" required value="{{ old('salary') }}">
            </div>

            <button type="submit" class="inline-flex items-center align-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none">
                Create Job Listing
            </button>
        </form>
    </div>
</x-layout>
