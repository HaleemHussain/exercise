<x-layout>
    <h1>{{ $product->name }}</h1>
    <div class="product-page">
        <div>
            @if($product->images->count() > 0)
                <div class="relative w-full" x-data="{ current: 0, total: {{ $product->images->count() }} }">

                    <div class="overflow-hidden rounded-lg">
                        @foreach($product->images as $index => $image)
                            <div x-show="current === {{ $index }}" class="w-full">
                                <img src="{{ asset('images/product/' . $image->path) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full object-cover rounded-lg">
                            </div>
                        @endforeach
                    </div>

                    <button @click="current = (current - 1 + total) % total"
                            class="absolute left-2 top-1/2 -translate-y-1/2 bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-pink-500">
                        &#8592;
                    </button>
                    <button @click="current = (current + 1) % total"
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-white text-gray-800 rounded-full w-8 h-8 flex items-center justify-center shadow hover:bg-pink-500">
                        &#8594;
                    </button>

                    <div class="flex justify-center gap-2 mt-3">
                        @foreach($product->images as $index => $image)
                            <button @click="current = {{ $index }}"
                                    :class="current === {{ $index }} ? 'bg-pink-500' : 'bg-gray-300'"
                                    class="w-3 h-3 rounded-full transition-colors">
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div>
            {!! $product->description !!}
            <p>&pound;{{ $product->price }}</p>
        </div>
    </div>
</x-layout>
