<div>
    <h1 class="text-xl font-bold mb-4">Edit Category</h1>

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" wire:model="name" class="border p-2 w-full" />
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('categories.index') }}" class="ml-2 text-gray-700 underline">Cancel</a>
    </form>
</div>
