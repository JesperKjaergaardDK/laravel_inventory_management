<x-layout>
  <h1>Welcommon {{ Auth::user()->name }} to the storage </h1>
  <h2>Your role is {{ Auth::user()->role->role }}</h2>

  <form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit">Logout</button>
  </form>

  <a href="{{ route('storage.create') }}">Create a new product</a>
  <p>{{ session('success') }}</p>
  <p>___________________</p>

  @foreach ($items as $item)
    <div class="product_item">
      <p>{{ $item->id }}</p>
      <p>{{ $item->product_name }}</p>
      <p>{{ $item->price }}</p>
      <p>{{ $item->quantity }}</p>

      @if (Auth::user()->role_id == 2)
        @auth
        <a href="{{ route('storage.edit', $item->id) }}">Edit</a>

        <form action="{{ route('storage.destroy', $item->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button onclick="confirm('Are you sure about deleting this item')" type="submit">Delete</button>
        </form>
        @endauth
      @endif
      
    
    </div>
  @endforeach

</x-layout>
