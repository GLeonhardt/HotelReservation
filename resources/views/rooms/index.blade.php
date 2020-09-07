@extends('layouts.app')

@section ('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/home">{{ __('general.back') }}</a>
      <a href="/rooms/create" class="btn btn-primary float-right" >{{ __('room.add') }}</a>
      <h2>{{ __('room.list') }}</h2>
      @foreach($rooms as $room)
      <a href="/rooms/{{$room->id}}">
        <div class="card mt-2 p-2">
          <h3> {{ $room->room_identifier }} </h3>
          <p> {{ $room->stars}} {{ __('room.stars') }}</p>
          <p> {{ __('room.hotel') }}: {{ $room->hotel->name}} </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>

@endsection