

<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-900 dark:text-white">Inventory</h2>
        {{-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> --}}
    </div> 
    
        <div class="mb-10">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-300">
                <h4 class="mb-5 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white ">Hardware</h4>
                     <table class="w-full text-left text-xs font-light table-auto">
                        <thead class="border-b font-small dark:border-neutral-500 bg-green-700 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Item</th>
                            <th scope="col" class="px-6 py-4">Brand</th>
                            <th scope="col" class="px-6 py-4">Model</th>
                            <th scope="col" class="px-6 py-4">Serial #</th>
                            <th scope="col" class="px-6 py-4">Asset #</th>
                            <th scope="col" class="px-6 py-4">Purchase Date</th>
                            <th scope="col" class="px-6 py-4">Purchase Price</th>
                            <th scope="col" class="px-6 py-4">Department</th>
                            <th scope="col" class="px-6 py-4">Location</th>
                            <th scope="col" class="px-6 py-4">Disposition</th>
                            <th scope="col" class="px-6 py-4">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($inventory as $key => $item)
                            <tr class="border-b dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$key }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->item->item_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->brand }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->model }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->serial_number }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->asset_number }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->purchase_date->format('Y-m-d') }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->purchase_price }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->department->department_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->location }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->disposition }}</td>
                                    @if($item->status  == '1')  
                                    <td class="whitespace-nowrap px-6 py-4 text-green-700">Active</td>
                                    @elseif ($item->status  == '2') 
                                        <td class="whitespace-nowrap px-6 py-4 text-red-700">Disabled</td>
                                    @endif
                            </tr>
                        @endforeach
                        </tbody>
                     </table>
                </div>
                {{ $inventory->links() }}
            </div>



            <div class="mb-10">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg h-300">
                    <h4 class="mb-5 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-white ">Computer</h4>
                         <table class="w-full text-left text-xs font-light table-auto">
                            <thead class="border-b font-small dark:border-neutral-500 bg-green-700 text-white">
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($inventory_computer as $key => $item)
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
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                         </table>
                    </div>
                    {{ $inventory_computer->links() }}
                </div>


</div>