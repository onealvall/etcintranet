<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Create User")  }}
            </h2>
        </div>
    </x-slot>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium">
                            {{ __('User Information') }}
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
                        action="/users"
                        class="mt-6 space-y-6"
                    >
                    @csrf

                        <!-- Name -->
                        <div class="space-y-2">
                            <x-form.label
                                for="name"
                                :value="__('Name')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-heroicon-o-user  aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="name"
                                    class="block w-full"
                                    type="text"
                                    name="name"
                                    :value="old('name')"
                                    required
                                    autofocus
                                    placeholder="{{ __('Name') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                      <!-- Email Address -->
                        <div class="space-y-2">
                            <x-form.label
                                for="email"
                                :value="__('Email')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-heroicon-o-user  aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="email"
                                    class="block w-full"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    placeholder="{{ __('Email') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>

                        
                        <!-- Password -->
                        <div class="space-y-2">
                            <x-form.label
                                for="password"
                                :value="__('Password')"
                            />

                            <x-form.input-with-icon-wrapper>
                                <x-slot name="icon">
                                    <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                                </x-slot>

                                <x-form.input
                                    withicon
                                    id="password"
                                    class="block w-full"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="{{ __('Password') }}"
                                />
                            </x-form.input-with-icon-wrapper>
                        </div>


                             <!-- Confirm Password -->
                            <div class="space-y-2">
                                <x-form.label
                                    for="password_confirmation"
                                    :value="__('Confirm Password')"
                                />

                                <x-form.input-with-icon-wrapper>
                                    <x-slot name="icon">
                                        <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                                    </x-slot>

                                    <x-form.input
                                        withicon
                                        id="password_confirmation"
                                        class="block w-full"
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        placeholder="{{ __('Confirm Password') }}"
                                    />
                                </x-form.input-with-icon-wrapper>
                            </div>


                            <div>
                                <x-button class="justify-center" variant="success">
                         
            
                                    <span>{{ __('Register') }}</span>
                                </x-button>
                            </div>
                        
                   </form>
                </div>
            </div>
</x-app-layout>