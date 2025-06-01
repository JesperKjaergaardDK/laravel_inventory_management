<x-layout>
  <div class="w-md flex flex-col justify-center m-auto ">
    <div class="flex flex-col gap-4">
      <h1 class="font-bold text-[2rem]">Welcommon {{ Auth::user()->name }} to the storage </h1>
      <h2 class="font-bold text-[1rem]">Your role is {{ Auth::user()->role->role }}</h2>
      <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="bg-red-700 text-white" type="submit">Logout</button>
      </form>
      
      <a  href="{{ route('storage.create') }}"><button class="bg-green-700 text-white">Create a new product</button></a>
    </div>


    <div class="product_list">
      @foreach ($items as $item)
        <div class="product_item">
          <div class="flex gap-4">
            <p>{{ $item->id }}</p>
            <p>{{ $item->product_name }}</p>
            <p>{{ $item->price }}</p>
            <p>{{ $item->quantity }}</p>
          </div>

          <div class="flex gap-4">
            @if (Auth::user()->role_id == 2)
              @auth
                <a href="{{ route('storage.edit', $item->id) }}">Edit</a>
                <form action="{{ route('storage.destroy', $item->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button onclick="return  confirm('Are you sure about deleting this item')" type="submit">Delete</button>
                </form>
              @endauth
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>

</x-layout>
