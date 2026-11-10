@extends('layouts.app')

@section('content')

  <h1>Városok</h1>
<a href="{{route('cities.create')}}">Új város</a>
  @foreach($cities as $city)
      <p>{{ $city->name }}
        {{ $city->zip_code }}
        {{ $city->county->name }}
        <a href="{{ route('cities.edit', $city->id) }}">Szerkesztés</a>
        <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
  @csrf
  @method('DELETE')
  <button type="submit">Törlés</button>
</form>
      </p> 
  @endforeach

@endsection
