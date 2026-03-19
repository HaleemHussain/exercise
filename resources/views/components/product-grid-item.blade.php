<a href="{{ route('product.show', $product->slug) }}">
    <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->name }}">
    {{ $product->name }}
</a>
