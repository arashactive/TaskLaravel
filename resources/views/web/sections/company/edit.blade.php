@extends('web.layout')

@section("content")
<h4 class="mb-4 mt-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Company Settings:
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @include('components.message')
    <form action="{{ route('panel.company.update') }}" method="post">
        @csrf
        {{ method_field('PUT') }}
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name</span>
            <input name="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Fullstack Agentur" value="{{ $company->name ?? '' }}">
        </label>

        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">IBAN</span>
            <input name="iban" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="IBAN" value="{{ $company->IBAN ?? '' }}">
        </label>

        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">BIC</span>
            <input name="bic" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="BIC" value="{{ $company->BIC ?? '' }}">
        </label>

        <input type="submit" class=" px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="Update" />
    </form>
</div>
@endsection