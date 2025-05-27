<x-layout>
  <a href="{{ route('storage.index') }}">Go back</a>


  <form action="{{ route('storage.store') }}" method="POST">
    @csrf

    <label for=""></label>
    <input type="text" name="product_name" value="{{ old('product_name') }}">

    <label for=""></label>
    <input type="number" name="price" value="{{ old('price') }}">

    <label for=""></label>
    <input type="number" name="quantity" value="{{ old('quantity') }}">

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
