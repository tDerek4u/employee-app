<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Permissions Management Table</h1>
        <div class="p-4">
            <Link href="{{ route('admin.permissions.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Permission</Link>
        </div>
    </div>
    <x-splade-table :for="$permissions" class=" border-spacing-24" >
        @cell('action',$permission)
        <div class="space-x-2">
            <Link href="{{ route('admin.permissions.edit', $permission) }}"
            class="text-green-400 hover:text-green-700 font-semibold">
        Edit
        </Link>
        <Link href="{{ route('admin.permissions.destroy', $permission) }}" method="DELETE" confirm
            class="text-red-400 hover:text-red-700 font-semibold">
        Delete
        </Link>
        </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
