<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Audit Trail")  }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="flex flex-col ">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
        
                <div class="flex float-right">
                    <div class="mb-6 xl:w-96">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        </div>
                    </div>
                </div> 
       
                <table class="w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                    <tr>
                        <th scope="col" class="px-6 py-4">#</th>
                        <th scope="col" class="px-6 py-4">Email</th>
                        <th scope="col" class="px-6 py-4">Details</th>
                        <th scope="col" class="px-6 py-4">Module</th>
                        <th scope="col" class="px-6 py-4">Action Type</th>
                        <th scope="col" class="px-6 py-4">Date time </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($audit as $key => $item)
                        <tr class="border-b ">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  ++$key }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  $item->user_id }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  $item->details }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  $item->module }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  $item->action_type }}</td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{  $item->created_at }}</td>
                        </tr>  
                    @endforeach
                </tbody>
         </table>
      </div>

       {{ $audit->links() }}

    </div>
  </div>
</div>
    </div>
</x-app-layout>