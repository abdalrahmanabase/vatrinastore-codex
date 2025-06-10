<div>
    <h1 class="text-xl font-bold mb-4">Categories</h1>

    <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Category</a>

    @if (session()->has('message'))
        <div class="mt-2 text-green-600">{{ session('message') }}</div>
    @endif

    <table class="mt-4 w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Slug</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">{{ $category->slug }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600">Edit</a> |
                        <button wire:click="delete({{ $category->id }})" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center py-2">No categories found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
