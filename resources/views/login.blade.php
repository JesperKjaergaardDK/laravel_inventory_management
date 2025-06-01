<x-layout>
  <div class="flex flex-col gap-5 justify-center items-center bg-gray-300 w-min m-auto p-5 border-1 rounded-md mt-5">
    <h1 class="text-[2rem] font-bold" >Login</h1>

    <form action="{{ route('loginAttempt') }}" method="POST">
      @csrf

      <div>
        <label for="email">E-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}">
      </div>

      <div>
        <label for="password">Passowrd</label>
        <input id="password" type="text" name="password" value="{{ old('password') }}">
      </div>

      <button type="submit">Submit</button>
    </form>

    @if ($errors->all())
      <ul>
        @foreach ($errors->all() as $error)
          <li class="text-red-600">* {{ $error }}</li>
        @endforeach
      </ul>
    @endif
  </div>

</x-layout>
