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
                        action="/pdf"
                        class="mt-6 space-y-6"
                       enctype="multipart/form-data"
                    >
                    @csrf
                        <div class="space-y-2">
                            <x-form.label
                                for="pdf_name"
                                value="Name"
                            />
            
                            <x-form.input
                                id="pdf_name"
                                name="pdf_name"
                                type="text"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="pdf_name"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="pdf_file"
                                value="File"
                            />
            
                            <x-form.input
                                id="pdf_file"
                                name="pdf_file"
                                type="file"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="pdf_file"
                            />
                        </div>


                        <div class="space-y-2">
                            <x-form.label
                                for="pdf_arrangement"
                                value="Arrangement"
                            />
            
                            <x-form.input
                                id="pdf_arrangement"
                                name="pdf_arrangement"
                                type="number"
                                class="block w-full"
                                value=""
                                required
                                autocomplete="pdf_arrangement"
                            />
                        </div>

                        <div class="space-y-2">
                            <x-form.label
                                for="pdf_status"
                                value=" Status"
                            />
            
                            <select id="pdf_status" name="pdf_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1" selected>Active </option>
                                <option value="2">Disable</option>
                            </select>
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

                        <x-button variant="success">
                            {{ __('Save') }}
                        </x-button>
                        
                   </form>
                </div>
            </div>
</x-app-layout>