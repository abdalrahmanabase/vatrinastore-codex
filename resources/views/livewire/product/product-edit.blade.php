<div>
    <h1 class="text-xl font-bold mb-4">Edit Product</h1>

    <form wire:submit.prevent="update" class="space-y-4">
        <div>
            <label class="block">Title</label>
            <input type="text" wire:model="title" class="border rounded w-full" />
            @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Description</label>
            <textarea wire:model="description" class="border rounded w-full"></textarea>
        </div>

        <div>
            <label class="block">Price</label>
            <input type="number" wire:model="price" class="border rounded w-full" />
            @error('price') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block">Category</label>
            <select wire:model="category_id" class="border rounded w-full">
                <option value="">--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Sub Category</label>
            <select wire:model="sub_category_id" class="border rounded w-full">
                <option value="">--</option>
                @foreach($subCategories as $sub)
                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
    </form>
</div>
