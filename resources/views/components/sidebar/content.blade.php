

<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-heroicon-o-calendar-days class="w-7 text-green-500" />
        </x-slot>
    </x-sidebar.link>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-green-500"
    >
        Inventory
    </div>

    <x-sidebar.link
        title="Computer Inventory"
        href="/computer"
        :isActive="request()->routeIs('')"
    >
    <x-slot name="icon">
        <x-heroicon-o-document-plus class="w-7 text-green-500" />
    </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Hardware Inventory"
        href="/hardware"
        :isActive="request()->routeIs('')"
        >
        <x-slot name="icon">
            <x-heroicon-o-document-plus class="w-7 text-green-500" />
        </x-slot>
   </x-sidebar.link>

{{-- 
    <x-sidebar.dropdown
        title="Hardware Inventory"
        :active="Str::startsWith(request()->route()->uri(), '')"
    >
    <x-slot name="icon">
        <x-heroicon-o-document-plus class="w-7 text-green-500" />
    </x-slot>

    <x-sidebar.sublink
        title="Monitor"
        href="/hardware"
        :active="request()->routeIs('buttons.text')"
    />
    <x-sidebar.sublink
        title="System Unit"
        href="/hardware"
        :active="request()->routeIs('buttons.icon')"
    />
    <x-sidebar.sublink
        title="Mouse"
        href="/hardware"
        :active="request()->routeIs('buttons.text-icon')"
    />
    <x-sidebar.sublink
        title="Keyboard"
        href="/hardware"
        :active="request()->routeIs('buttons.text-icon')"
    />
</x-sidebar.dropdown> --}}

<div
    x-transition
    x-show="isSidebarOpen || isSidebarHovered"
    class="text-sm text-green-500"
    >
    Settings
</div>

<x-sidebar.link
    title="Manage Department"
    href="/department"
    :isActive="request()->routeIs('department')"
    >
    <x-slot name="icon">
        <x-heroicon-m-puzzle-piece  class="w-7 text-green-500" />
    </x-slot>
</x-sidebar.link>

<x-sidebar.link
    title="Upload PDF"
    href="/pdf"
    :isActive="request()->routeIs('')"
    >
    <x-slot name="icon">
        <x-heroicon-m-clipboard-document class="w-7 text-green-500" />
    </x-slot>
</x-sidebar.link>

<x-sidebar.link
    title="Manage Hardware"
    href="/Item"
    :isActive="request()->routeIs('')"
    >
    <x-slot name="icon">
        <x-heroicon-o-server-stack class="w-7 text-green-500" />
    </x-slot>
</x-sidebar.link>

<x-sidebar.link
    title="Manage Users"
    href="/users"
    :isActive="request()->routeIs('')"
    >
    <x-slot name="icon" >
        <x-heroicon-o-users   class="w-7 text-green-500" />
    </x-slot>

</x-sidebar.link>


<x-sidebar.link
    title="Manage IT "
    href="/etcit"
    :isActive="request()->routeIs('')"
    >
    <x-slot name="icon" >
        <x-heroicon-o-users   class="w-7 text-green-500" />
    </x-slot>

</x-sidebar.link>

<x-sidebar.link
    title="Audit Trail"
    href="/audittrail"
    :isActive="request()->routeIs('')"
    >

    <x-slot name="icon">
        <x-heroicon-o-x-circle  class="w-7 text-green-500" />
    </x-slot>

    
</x-sidebar.link>

<hr>




</x-perfect-scrollbar>
