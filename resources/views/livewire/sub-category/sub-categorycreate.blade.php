<div>
    <h2>Create SubCategory</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
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

        <div>
            <label>Name</label>
            <input type="text" wire:model="name" required />
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>


        <button type="submit">Save</button>
    </form>
</div>
