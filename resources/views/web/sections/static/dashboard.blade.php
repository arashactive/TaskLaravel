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

<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Last XMLs:
</h4>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Excel</th>
                    <th class="px-4 py-3">XML</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($lastXMLs as $xml)


                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $xml->file }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ $xml->xml_file }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $xml->updated_at }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a href="{{ route('panel.xml.show', $xml->id) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection