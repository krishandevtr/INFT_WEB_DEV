@if ($errors->any())
    <ul class="list-disc pl-5 text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
