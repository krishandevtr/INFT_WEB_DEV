<!-- resources/views/auth/register.blade.php -->
<x-layout title="Register" heading="Create a New Account">
    <div class="max-w-md mx-auto p-6 border border-gray-300 rounded-lg shadow-md">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm" required>
            </div>

            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none">
                Register
            </button>
        </form>
    </div>
</x-layout>
