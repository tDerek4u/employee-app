<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">Countries Management Table</h1>
        <div class="p-4">
            <Link href="{{ route('admin.countries.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">New Country</Link>
        </div>
    </div>
    <x-splade-table :for="$countries" class=" border-spacing-24" >
        @cell('action',$country)
        <div class="space-x-2">
            <Link href="{{ route('admin.countries.edit', $country) }}"
                    class="text-green-400 hover:text-green-700 font-semibold">
                Edit
                </Link>
                <Link href="{{ route('admin.countries.destroy', $country) }}" method="DELETE" confirm
                    class="text-red-400 hover:text-red-700 font-semibold">
                Delete
                </Link>
        </div>
        @endcell
    </x-splade-table>
</x-admin-layout>
