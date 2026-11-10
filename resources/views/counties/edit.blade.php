@extends('layouts.app')

@section('content')
<h1>Megye módosítása</h1>

  <form action="{{ route('counties.update', $county->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <label for="name">Megye neve</label>
      <input type="text" name="name" id="name" value="{{ old('name', $county->name) }}" required>
      <!-- @error('name')
          <div class="error">{{ $message }}</div>
      @enderror -->

      <button type="submit">Mentés</button>
      <a href="{{ route('counties.index') }}">Mégse</a>
  </form>
@endsection
