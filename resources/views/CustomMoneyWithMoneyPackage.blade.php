@foreach ($products as $product)
<div>
    <p>Name: {{$product->name}}</p>
    <p>Description: {{$product->description}}</p>
    <p>Currency: {{$product->currency}}</p>
    <p>Price: {{$product->price}}</p>
    <p>Sales: {{$product->sales}}</p>
    <p>Stock: {{$product->stock}}</p>
</div>
@endforeach
