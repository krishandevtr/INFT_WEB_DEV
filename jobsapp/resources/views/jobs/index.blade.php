<x-layout title="Jobs" heading="All Job Listings">
    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id']}}" class="text-blue-500 hover:underline">
                <strong>{{ $job['title'] }}</strong> : pays ({{ $job['salary'] }}) per year
            </a>
        </li>
    @endforeach

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</x-layout>
