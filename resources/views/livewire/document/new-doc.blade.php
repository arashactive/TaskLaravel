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

    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">IBAN</th>
                <th class="px-4 py-3">BIC</th>
                <th class="px-4 py-3">AMOUNT</th>
                <th class="px-4 py-3">DESC</th>
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