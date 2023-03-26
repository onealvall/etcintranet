<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Create Department")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('Deparment Information') }}
                        </h2>       
                    </header>

                    <form
                        method="post"
                        action="/department"
                        class="mt-6 space-y-6"
                    >
                    @csrf
                        <div class="space-y-2">
                            <x-form.label
                                for="department"
                                value="Department Name"
                            />
            
                            <x-form.input
                                id="department_name"
                                name="department_name"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="email"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="department_status"
                                value="Department Status"
                            />
            
                            <select id="department_status" name="department_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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