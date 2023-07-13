<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold p-4">New Role</h1>
    </div>
    <x-splade-form  :action="route('admin.roles.store')" class="p-4 bg-white rounded-md space-y-2">
        <x-splade-input name="name" label="Name" />
        <x-splade-select name="permission[]" :options="$permissions" multiple relation choices/>
        <x-splade-submit class="mt-6"/>
    </x-splade-form>
</x-admin-layout>
