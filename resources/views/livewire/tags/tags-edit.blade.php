<div>
    <h2 class="text-xl font-bold mb-4">Edit Tag</h2>

    @if (session()->has('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label class="block text-sm font-medium">Name</label>
            <input type="text" wire:model="name" class="border rounded w-full p-2" />
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('tags.index') }}" class="ml-2 text-gray-600">Back</a>
    </form>
</div>
