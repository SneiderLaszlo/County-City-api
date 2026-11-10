@extends('layouts.app')
 
@section('content')
<h1>Új város</h1>
 
  <form action="{{ route('cities.store') }}" method="POST">
      @csrf
 
      <label for="name">Város neve</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror
 
      <label for="zip_code">Irányítószám</label>
      <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code') }}" required>
      @error('zip_code')
          <div class="error">{{ $message }}</div>
      @enderror
 
      <label for="county_id">Megye</label>
      <select name="county_id" id="county_id" required>
          <option value="">-- Válassz megyét --</option>
          @foreach($counties as $county)
              <option value="{{ $county->id }}" {{ old('county_id') == $county->id ? 'selected' : '' }}>
                  {{ $county->name }}
              </option>
          @endforeach
      </select>
      @error('county_id')
          <div class="error">{{ $message }}</div>
      @enderror
 
      <button type="submit">Mentés</button>
      <a href="{{ route('cities.index') }}">Mégse</a>
  </form>
@endsection