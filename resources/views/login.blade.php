<x-layout>

  <h1>Login</h1>

  <form action="{{ route('loginAttempt') }}" method="POST">
    @csrf
    <label for=""></label>
    <input type="email" name="email" value="{{ old('email') }}">

    <label for=""></label>
    <input type="text" name="password" value="{{ old('password') }}">

    <button type="submit">Submit</button>
  </form>

  @if ($errors->all())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

</x-layout>
