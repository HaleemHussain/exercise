<x-mail::message>
    You have a new product Enquiry:
    <br>
    {{ $product->name }}
    <br>
    <br>
    From:
    <br>
    {{ $name }} ({{ $email }})

<x-mail::button :url="route('product.show', $product)">
    View Product
</x-mail::button>

</x-mail::message>
