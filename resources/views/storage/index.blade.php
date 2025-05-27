<x-layout>
  <h1>Data</h1>
  <a href="{{ route('storage.create') }}">Create a new product</a>
  <p>{{session('success') }}</p>
  <p>___________________</p>

  @foreach ($items as $item)
    <div class="product_item">
      <p>{{ $item->id }}</p>
      <p>{{ $item->product_name }}</p>
      <p>{{ $item->price }}</p>
      <p>{{ $item->quantity }}</p>

      <a href="{{route('storage.edit', $item->id)}}">Edit</a>

      <form action="{{ route('storage.destroy', $item->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button onclick="confirm('Are you sure about deleting this item')" type="submit">Delete</button>
      </form>
    </div>
  @endforeach

</x-layout>
