
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Team</h2>
            {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
        </div> 
    

        <div class="grid place-items-center gap-8 mb-6 sm:mb-16 sm:grid-cols-1">
            @foreach ($it_manager as $key => $it_manager)
                 <div class="items-center  bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 pr-10">
                    <a href="#"  >
                        <img  class="h-56 w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="{{ URL('images/ETC-IT-ORG-CHART/'.$it_manager->image_path) }}" alt="Bonnie Avatar">
                    </a>
                    <div class="p-5 h-56">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">{{ $it_manager->name }}</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">{{ $it_manager->position }}</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">{{ $it_manager->details }}</p>
                    </div>
                </div> 
            @endforeach
        </div>
        
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
            @foreach ($it_support as $key => $it_support)
                <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="h-56 w-full rounded-lg sm:rounded-none sm:rounded-l-lg" src="{{ URL('images/ETC-IT-ORG-CHART/'.$it_manager->image_path) }}" alt="Bonnie Avatar">
                    </a>
                    <div class="p-5">
                        <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="#">{{ $it_manager->name }}</a>
                        </h3>
                        <span class="text-gray-500 dark:text-gray-400">{{ $it_manager->position }}</span>
                        <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">{{ $it_manager->details }}</p>
                    </div>
                </div> 
            @endforeach
        </div>  
    </div>
 