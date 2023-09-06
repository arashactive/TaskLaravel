@extends('web.layout')

@section("content")
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Show Log
</h2>


<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                Excel File
            </p>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                {{ $file->file }}
            </p>
        </div>
    </div>
    <!-- Card -->
    <a class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" href="{{ route('panel.xml.download', $file->id) }}">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                XML
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                Download
            </p>
        </div>
    </a>
    <!-- Card -->
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                last update
            </p>
            <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                {{ $file->updated_at }}
            </p>
        </div>
    </div>

</div>


@endsection