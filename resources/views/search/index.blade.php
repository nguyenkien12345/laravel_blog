@foreach ($products as $product)
<div class="container">
    <p>Id: {{ $product->id }}</p>
    <p>Name: {{ $product->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Sales: {{ $product->sales }}</p>
    <p>Stock: {{ $product->stock }}</p>
</div>
@endforeach