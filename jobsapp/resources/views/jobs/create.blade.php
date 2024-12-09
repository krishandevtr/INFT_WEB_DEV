<x-layout title="Jobs" heading="Create Job Listing">
    <div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg shadow-md border border-black">

        @if ($errors->any())
            <x-form-error :name="'title'" />
            <x-form-error :name="'salary'" />
        @endif

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf

            <x-form-field>
                <x-form-label for="title" label="Job Title" />
                <x-form-input type="text" name="title" id="title" placeholder="Enter job title" required value="{{ old('title') }}" />
                <x-form-error :name="'title'" />
            </x-form-field>

            <x-form-field>
                <x-form-label for="salary" label="Salary" />
                <x-form-input type="number" name="salary" id="salary" placeholder="Enter salary amount" required value="{{ old('salary') }}" />
                <x-form-error :name="'salary'" />
            </x-form-field>

            <x-form-button>
                Create Job Listing
            </x-form-button>

        </form>
    </div>
</x-layout>



