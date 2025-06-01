<x-layout>
  <div class="w-md flex flex-col justify-center m-auto gap-3">

    <a href="{{ route('storage.index') }}"><button>Go back</button></a>
    
    <form action="{{ route('storage.update', $item->id) }}" method="POST">
      @csrf
      @method('PUT')
      
      <label for="product_name">Product name</label>
      <input class="pl-3" id="product_name" type="text" name="product_name" placeholder="productname"
      value="{{ old('product_name', $item->product_name) }}">
      
      <label for="price">Price</label>
      <input class="pl-3" id="price" type="number" name="price" placeholder="Price" value="{{ old('price', $item->price) }}">
      
      <label for="quantity">Quantity</label>
      <input class="pl-3" id="quantity" type="number" name="quantity" placeholder="Quantity" value="{{ old('quantity', $item->quantity) }}">
      
      <button class="bg-green-700 text-white" type="submit">Update</button>
    </form>
    
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
      <li class="text-red-600">* {{ $error }}</li>
      @endforeach
    </ul>
    @endif
    
  </div>
</x-layout>