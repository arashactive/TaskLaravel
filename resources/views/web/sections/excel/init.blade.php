@extends('web.layout')

@section("content")
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Excel
</h2>


<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @include('components.message')
    <form action="{{ route('panel.excel.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Excel File:</span>
            <input name="file" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
        </label>

        <input type="submit" class=" px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="upload..." />
    </form>
</div>


@endsection