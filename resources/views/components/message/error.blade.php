@if ($errors->any())
<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li class="text-red-600 dark:text-red-400">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif