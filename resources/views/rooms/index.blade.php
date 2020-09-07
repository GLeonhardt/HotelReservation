@extends('layouts.app')

@section ('content')
<div>
  <a href="/rooms/create">Add Room</a>
  <h2>Rooms list:</h2>
  <ul>
    @foreach($rooms as $room)
    <li>
      <a href="/rooms/{{$room->id}}">
        <h3> {{ $room->room_identifier }} </h3>
        <p> {{ $room->stars}}</p>
      </a>
      <a href="/hotels/{{$room->hotel_id}}">
        <p> {{ $room->hotel->name}}</p>
      </a>
    </li>
    @endforeach
  </ul>
</div>


@endsection