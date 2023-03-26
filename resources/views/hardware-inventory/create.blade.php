<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Create Hardware Inventory")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('Hardware Information') }}
                        </h2>       
                    </header>

                    @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <p>{{ $error }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <form
                        method="post"
                        action="/hardware"
                        class="mt-6 space-y-6"
                    >
                    @csrf


                        <div class="space-y-2">
                            <x-form.label
                                for="item"
                                value="Select Item"
                            />
            
                            <select id="item" name="item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($item as $item)
                                    <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="department"
                                value="Brand"
                            />
            
                            <x-form.input
                                id="brand_name"
                                name="brand_name"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="brand_name"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="model_name"
                                value="Model"
                            />
            
                            <x-form.input
                                id="model_name"
                                name="model_name"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="model_name"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="serial_number"
                                value="Serial Number"
                            />
            
                            <x-form.input
                                id="serial_number"
                                name="serial_number"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="serial_number"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="asset_number"
                                value="Asset Number"
                            />
            
                            <x-form.input
                                id="asset_number"
                                name="asset_number"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="asset_number"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="purchase_date"
                                value="Purchase Date"
                            />
            
                            <x-form.input
                                id="purchase_date"
                                name="purchase_date"
                                type="date"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="purchase_date"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="purchase_price"
                                value="Purchase Price"
                            />
            
                            <x-form.input
                                id="purchase_price"
                                name="purchase_price"
                                type="number"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="purchase_price"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="department"
                                value="Select Department"
                            />
            
                            <select id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($department as $item)
                                    <option value="{{ $item->id }}">{{ $item->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="location"
                                value="Location"
                            />
            
                            <x-form.input
                                id="location"
                                name="location"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="location"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="disposition"
                                value="Disposition"
                            />
            
                            <x-form.input
                                id="disposition"
                                name="disposition"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="disposition"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="status"
                                value="Item Status"
                            />
            
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1" selected>Active </option>
                                <option value="2">Disable</option>
                            </select>
                        </div>

                        <x-button variant="success">
                            {{ __('Save') }}
                        </x-button>
                        
                   </form>
                </div>
            </div>
</x-app-layout>