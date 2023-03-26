<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Edit Computer Inventory")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('Computer Information') }}
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
                        action="/computer/{{ $computer->id }}"
                        class="mt-6 space-y-6"
                    >
                    @csrf
                    @method('PUT')

                        <div class="space-y-2">
                            <x-form.label
                                for="computer_name"
                                value="Computer Name"
                            />
            
                            <x-form.input
                                id="computer_name"
                                name="computer_name"
                                type="text"
                                class="block w-full"
                                value="{{ $computer->computer_name }}"
                                required
                                autocomplete="computer_name"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="computer_type"
                                value="Computer Type"
                            />
            
                            <x-form.input
                                id="computer_type"
                                name="computer_type"
                                type="text"
                                class="block w-full"
                                value="{{ $computer->computer_type }}"
                                required
                                autocomplete="computer_type"
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
                                value="{{ $computer->asset_number }}"
                                required
                                autocomplete="asset_number"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="domain"
                                value="Domain"
                            />
            
                            <x-form.input
                                id="domain"
                                name="domain"
                                type="text"
                                class="block w-full"
                                value="{{ $computer->domain }}"
                                required
                                autocomplete="domain"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="system_type"
                                value="System Type"
                            />
            
                            <x-form.input
                                id="system_type"
                                name="system_type"
                                type="text"
                                class="block w-full"
                                value="{{ $computer->system_type }}"
                                required
                                autocomplete="system_type"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="department"
                                value="Select Department"
                            />
            
                            <select id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option seleted value="{{ $computer->department->id }}">{{ $computer->department->department_name }}</option>
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
                                value="{{ $computer->location }}"
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
                                value="{{ $computer->disposition }}"
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
                                @if($computer->status  == '1')  
                                    <option seleted value="{{ $computer->status }}">Active </option>
                                    <option value="2">Disable</option>
                               @elseif ($computer->status  == '2') 
                                    <option seleted value="{{ $computer->status }}"> Disable </option>
                                    <option value="1">Active </option>
                                @endif  
                            </select>
                        </div>

                        <x-button variant="success">
                            {{ __('Save') }}
                        </x-button>
                        
                   </form>
                </div>
            </div>
</x-app-layout>