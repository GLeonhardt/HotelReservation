@extends('layouts.app')

@section ('content')
<div>
  <h2>Edit room</h2>
  <p>Hotel: {{$room->hotel->name}}</p>
  <form method="POST" action="/rooms/{{ $room->id }}">
    @csrf
    @method('PUT')

    <label for="room_identifier">Room Identifier:</label>
    <input
      id="room_identifier"
      name="room_identifier"
      type="text"
      value="{{ $room->room_identifier }}"
    />
    @error('room_identifier')
      <p cass="Form__error">{{ $errors->first('room_identifier') }}</p>
    @enderror

    <label for="stars">Number of stars:</label>

    <select name="stars" id="stars">
        <option value="{{$room->stars}}">{{$room->stars}}</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    @error('stars')
      <p cass="Form__error">{{ $errors->first('stars') }}</p>
    @enderror

    <input
      id="hotel_id"
      name="hotel_id"
      type="hidden"
      value="{{ $room->hotel_id }}"
    />
    <button type="submit">Update</button>
  </form>

</div>


@endsection