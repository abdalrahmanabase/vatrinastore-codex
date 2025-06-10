<div>
    <h2>SubCategories</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Create New SubCategory</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subCategories as $subCategory)
                <tr>
                    <td>{{ $subCategory->id }}</td>
                    <td>{{ $subCategory->name }}</td>
                    <td>{{ $subCategory->slug }}</td>
                    <td>{{ $subCategory->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $subCategory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button wire:click="delete({{ $subCategory->id }})" class="btn btn-sm btn-danger" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No subcategories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
