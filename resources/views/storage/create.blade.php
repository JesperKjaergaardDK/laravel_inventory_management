<x-layout>
  <div class="w-md flex flex-col justify-center m-auto gap-3">

    <a href="{{ route('storage.index') }}"><button>Go back</button></a>
    
    
    <form action="{{ route('storage.store') }}" method="POST">
      @csrf
      
      <label for="product_name">Product name</label>
      <input type="text" id="product_name" name="product_name" value="{{ old('product_name') }}">
      
      <label for="price">Price</label>
      <input type="number" id="price" name="price" value="{{ old('price') }}">
      
      <label for="quantity">Quantity</label>
      <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}">
      
      <button class="bg-green-700 text-white" type="submit">Create</button>
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
