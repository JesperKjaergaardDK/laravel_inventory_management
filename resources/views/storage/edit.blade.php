<x-layout>
  <a href="{{ route('storage.index') }}">Go back</a>

  <form action="{{ route('storage.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for=""></label>
    <input type="text" name="product_name" placeholder="productname"
      value="{{ old('product_name', $item->product_name) }}">

    <label for=""></label>
    <input type="number" name="price" placeholder="Price" value="{{ old('price', $item->price) }}">

    <label for=""></label>
    <input type="number" name="quantity" placeholder="Quantity" value="{{ old('quantity', $item->quantity) }}">

    <button type="submit">Create</button>
  </form>

  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

</x-layout>
