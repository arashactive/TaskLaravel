@extends('web.layout')

@section("content")
<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Excel uploaded
</h2>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">

        <livewire:document.new-doc :excelRows="$excelRows"/>

    </div>

</div>


@endsection