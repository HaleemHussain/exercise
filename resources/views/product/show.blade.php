<x-layout>
    <h1>{{ $product->name }}</h1>
    <div class="product-page">
        <div>
            @if($product->images->count() > 0)
                <div class="product-images">
                    @foreach($product->images as $image)
                        <img src="{{ asset('images/product/' . $image->path) }}" alt="{{ $product->name }}">
                    @endforeach
                </div>
            @endif
        </div>
        <div>
            {!! $product->description !!}
            <p>&pound;{{ $product->price }}</p>
        </div>
    </div>
</x-layout>
