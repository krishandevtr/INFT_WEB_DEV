<button {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-500 focus:outline-none']) }} type="{{ $type ?? 'submit' }}">
    {{ $slot }}
</button>
