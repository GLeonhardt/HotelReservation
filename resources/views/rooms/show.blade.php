@extends('layouts.app')

@section ('content')

<div>
  <a href="/rooms">Back</a>
  <form method="POST" action="/rooms/{{ $room->id }}">
    @csrf
    @method('DELETE')

    <h2>{{ $room->room_identifier }}</h2>
    <p> {{ $room->stars}} stars</p>
    <p> {{ $room->hotel->name}}</p>
    <a href="/rooms/{{ $room->id }}/edit">Edit</a>
    <button type="submit">Remove</button>
    @error('delete')
      <p cass="Form__error">{{ $errors->first('delete') }}</p>
    @enderror
  </form>
</div>


@endsection