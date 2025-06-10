<div>
    <h2 class="text-xl font-bold mb-4">Tags List</h2>

    @if (session()->has('message'))
        <div class="text-green-600 mb-2">{{ session('message') }}</div>
    @endif

    <a href="{{ route('tags.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Tag</a>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $tag->name }}</td>
                    <td class="px-4 py-2">{{ $tag->slug }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('tags.edit', $tag->id) }}" class="text-blue-600 mr-2">Edit</a>
                        <button wire:click="delete({{ $tag->id }})" class="text-red-600" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
