<div>

    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Company Name</span>
                <input wire:model.live="debitName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
            </label>
            <label class="block text-sm  mt-4">
                <span class="text-gray-700 dark:text-gray-400">Execute On</span>
                <select wire:model.live="offset" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="0">0</option>
                    <option value="+1">+1 day</option>
                    <option value="+2">+2 day</option>
                    <option value="+3">+3 day</option>
                </select>
            </label>

        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">IBAN</span>
                <input name="debitIBAN" value="{{ $debitIBAN ?? '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
            </label>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">BIC</span>
                <input name="debitBIC" value="{{ $debitBIC ?? '' }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
            </label>
        </div>
    </div>

    <button wire:click="generateXML" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        <span>XML Generate</span>
        <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
            <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
    </button>

    <table class="w-full whitespace-no-wrap mt-4">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">IBAN</th>
                <th class="px-4 py-3">BIC</th>
                <th class="px-4 py-3">AMOUNT</th>
                <th class="px-4 py-3">Refrence</th>
                <th class="px-4 py-3">End2End</th>
            </tr>
        </thead>
        @if(isset($excelRows) && !empty($excelRows))
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($excelRows as $key => $row)
            @if(!$loop->first)

            <x-document.customer.row :key="$key" :row="$row" />

            @endif
            @endforeach

        </tbody>
        @endif
    </table>

</div>