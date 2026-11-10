@extends('layouts.app')

@section('content')

  <h1>Megyék</h1>
<a href="{{route('counties.create')}}">Új megye</a>
  @foreach($counties as $county)
      <p>{{ $county->name }}
        <a href="{{ route('counties.edit', $county->id) }}">Szerkesztés</a>
        <form action="{{ route('counties.destroy', $county->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit">Törlés</button>
</form>
      </p> 
  @endforeach

@endsection

