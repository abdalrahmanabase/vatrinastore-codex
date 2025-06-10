<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6" data-aos="fade-up">
                        <a href="{{ route('products.show', $product->slug) }}" wire:navigate>
                            <h3 class="text-lg font-semibold mb-2">{{ $product->title }}</h3>
                        </a>
                        <p class="text-gray-600 dark:text-gray-400">${{ $product->price }}</p>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-600 dark:text-gray-400">No products found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
