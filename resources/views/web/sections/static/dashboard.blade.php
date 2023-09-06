@extends('web.layout')

@section("content")
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Dashboard
</h2>
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

    <!-- Card -->
    <a class="flex items-center justify-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" href="{{ URL::to('assets/download/customers_template.xlsx') }}">
        <span class="mb-8 mt-8 text-sm font-medium text-gray-600 dark:text-gray-400 ">
            Download excel template
        </span>
    </a>
    <!-- Card -->
    <a class="flex items-center justify-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" href="{{ route('panel.excel.init') }}">
        <span class="mb-8 mt-8  text-sm font-medium text-gray-600 dark:text-gray-400">
            Import excel file
        </span>
    </a>

    
</div>

@endsection