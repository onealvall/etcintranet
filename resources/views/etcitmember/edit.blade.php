<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Upload PDF")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('Upload  Information') }}
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
                        method="POST"
                        action="/etcit/{{ $etc->id }}"
                        class="mt-6 space-y-6"
                       enctype="multipart/form-data"
                    >
                    @csrf
                    @method('PUT')
                        <div class="space-y-2">
                            <x-form.label
                                for="file_path"
                                value="File"
                            />
            
                            <x-form.input
                                id="file_path"
                                name="file_path"
                                type="file"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="file_path"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="name"
                                value="Name"
                            />
            
                            <x-form.input
                                id="name"
                                name="name"
                                type="text"
                                class="block w-full"
                                value="{{ $etc->name }}"
                                required
                                autocomplete="name"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="position"
                                value="Position"
                            />
            
                            <select id="position" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                @if($etc->position  == 'IT Manager')  
                                    <option seleted value="{{ $etc->position }}">IT Manager </option>
                                    <option value="IT Support">IT Support</option>
                                @elseif ($etc->position  == 'IT Support') 
                                    <option seleted value="{{ $etc->position }}"> IT Support</option>
                                    <option value="IT Manager">IT Manager </option>
                                 @endif  
                            </select>
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="details"
                                value="Details"
                            />
            
                            <x-form.input
                                id="details"
                                name="details"
                                type="text"
                                class="block w-full"
                                value="{{ $etc->details }}"
                                required
                                autocomplete="details"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="arrangement"
                                value="Arrangement"
                            />
            
                            <x-form.input
                                id="arrangement"
                                name="arrangement"
                                type="number"
                                class="block w-full"
                                value="{{ $etc->arrangement }}"
                                required
                                autocomplete="arrangement"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="status"
                                value=" Status"
                            />
            
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                     @if($etc->status  == '1')  
                                        <option seleted value="{{ $etc->status }}">Active </option>
                                        <option value="2">Disable</option>
                                    @elseif ($etc->status  == '2') 
                                        <option seleted value="{{ $etc->status }}"> Disable </option>
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