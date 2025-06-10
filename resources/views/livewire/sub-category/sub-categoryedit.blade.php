<div>
    <h2>Edit SubCategory</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="update">
        <div>
            <label>Category</label>
            <select wire:model="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" wire:model="name" class="border p-2 w-full" />
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
