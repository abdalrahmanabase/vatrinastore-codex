<div>
    <h1 class="text-xl font-bold mb-4">Products</h1>

    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Add Product</a>

    @if (session()->has('message'))
        <div class="mt-2 text-green-600">{{ session('message') }}</div>
    @endif

    <table class="mt-4 w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-2 py-1">Title</th>
                <th class="px-2 py-1">Price</th>
                <th class="px-2 py-1">Category</th>
                <th class="px-2 py-1">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border px-2 py-1">{{ $product->title }}</td>
                    <td class="border px-2 py-1">{{ $product->price }}</td>
                    <td class="border px-2 py-1">{{ optional($product->category)->name }}</td>
                    <td class="border px-2 py-1 space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                        <button wire:click="delete({{ $product->id }})" class="text-red-500">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
