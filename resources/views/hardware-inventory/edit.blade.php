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
                        action="/hardware/{{ $hardware->id }}"
                        class="mt-6 space-y-6"
                    >
                    @csrf
                    @method('PUT')

                        <div class="space-y-2">
                            <x-form.label
                                for="item"
                                value="Select Item"
                            />
            
                            <select id="item" name="item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="{{ $hardware->item->id }}">{{ $hardware->item->item_name}}</option>
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
                                value="{{ $hardware->brand }}"
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
                                value="{{ $hardware->model }}"
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
                                value="{{ $hardware->serial_number }}"
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
                                value="{{ $hardware->asset_number }}"
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
                                value="{{ $hardware->purchase_date }}"
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
                                value="{{ $hardware->purchase_price }}"
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
                                   <option seleted value="{{ $hardware->department->id }}">{{ $hardware->department->department_name }}</option>
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
                                value="{{ $hardware->location }}"
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
                                value="{{ $hardware->disposition }}"
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
                                @if($item->status  == '1')  
                                     <option seleted value="{{ $hardware->status }}">Active </option>
                                     <option value="2">Disable</option>
                                @elseif ($item->status  == '2') 
                                    <option seleted value="{{ $hardware->status }}"> Disable </option>
                                    <option value="1">Active </option>
                                @endif    
                            </select>
                        </div>

                        <x-button variant="success">
                            {{ __('Update') }}
                        </x-button>
                        
                   </form>
                </div>
            </div>
</x-app-layout>