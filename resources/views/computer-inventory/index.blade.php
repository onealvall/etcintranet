<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __("Computer Inventory")  }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
 <div class="flex flex-col ">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">


        
        @if ($message = Session::get('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <p>{{ $message }}</p>
            </div>
        @elseif($message = Session::get('delete'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <div class="flex float-left">
            <div class="mb-6 xl:w-96">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                </div>
            </div>
          </div> 
        </div> 
          <div class="mb-6 xl:w-96">
             <x-button variant="success" size="sm" href="computer/create"> Create Computer Inventory </x-button>
          </div>

    
        <table class="w-full text-left text-xs font-light table-auto">
          <thead class="border-b font-small dark:border-neutral-500">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">Computer Name</th>
              <th scope="col" class="px-6 py-4">Computer Type</th>
              <th scope="col" class="px-6 py-4">Asset #</th>
              <th scope="col" class="px-6 py-4">Domain</th>
              <th scope="col" class="px-6 py-4">System Type</th>
              <th scope="col" class="px-6 py-4">Department</th>
              <th scope="col" class="px-6 py-4">Location</th>
              <th scope="col" class="px-6 py-4">Disposition</th>
              <th scope="col" class="px-6 py-4">Status</th>
              <th scope="col" class="px-6 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inventory as $key => $item)
              <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$key }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->computer_name }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->computer_type }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->asset_number }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->domain }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->system_type }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->department->department_name }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->location }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $item->disposition }}</td>
                      @if($item->status  == '1')  
                        <td class="whitespace-nowrap px-6 py-4 text-green-700">Active</td>
                      @elseif ($item->status  == '2') 
                          <td class="whitespace-nowrap px-6 py-4 text-red-700">Disabled</td>
                      @endif
                <td class="flex m-rwhitespace-nowrap px-6 py-4">
                    <x-button class="mr-2" variant="success" size="sm" href="computer/{{ $item->id }}/edit"> Edit </x-button>
                   <form action="/computer/{{ $item->id }}" method="POST">
                        @csrf
                        @method('delete')
                      <x-button variant="danger" size="sm" type="submit"> Delete </x-button>
                   </form>
                </td>
                <td class="whitespace-nowrap px-6 py-4"></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $inventory->links() }}
    </div>
  </div>
</div>
    </div>
</x-app-layout>