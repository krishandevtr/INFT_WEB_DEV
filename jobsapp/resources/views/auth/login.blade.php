<x-layout title="Log In" heading="Log In to Your Account">
    <div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg shadow-md">
        <form action="/login" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <!-- Sticky Email Field -->
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm"
                    value="{{ old('email') }}"
                    required
                >
                <!-- Display validation error for email -->
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm"
                    required
                >
                <!-- Display validation error for password -->
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none">
                Log In
            </button>
        </form>
    </div>
</x-layout>
