<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Edit Item")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('Item Information') }}
                        </h2>
                    </header>

                    @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <p>{{ $error }}</p>
                                </div>
                            @endforeach
                    @endif


                    <form
                        method="post"
                        action="/Item/{{ $item->id }}"
                        class="mt-6 space-y-6"
                    >
                    @csrf
                    @method('PUT')
                        <div class="space-y-2">
                            <x-form.label
                                for="Item"
                                value="Item Name"
                            />
            
                            <x-form.input
                                id="item_name"
                                name="item_name"
                                type="text"
                                class="block w-full"
                                value="{{ $item->item_name }}"
                                required
                                autocomplete="email"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="item_status"
                                value="Item Status"
                            />
            
                            <select id="item_status" name="item_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $item->status }}" selected>Active </option>
                                <option value="2">Disable</option>
                            </select>
                        </div>

                        <x-button variant="success">
                            {{ __('Update') }}
                        </x-button>
                        
                   </form>
                </div>
            </div>
</x-app-layout>