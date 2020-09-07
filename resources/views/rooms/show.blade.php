@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/rooms">{{ __('general.back') }}</a>
      <div class="card mt-2 p-2">
        <form method="POST" action="/rooms/{{ $room->id }}">
          @csrf
          @method('DELETE')
          <h2>{{ $room->room_identifier }}</h2>
          <p> {{ __('room.rating') }}: {{ $room->stars}} {{ __('room.stars') }}</p>
          <p> {{ __('room.hotel') }}: {{ $room->hotel->name}}</p>
          <a href="/rooms/{{ $room->id }}/edit" class="btn btn-small btn-primary">{{ __('general.edit') }}</a>
          <button type="submit" class="btn btn-small btn-danger">{{ __('general.remove') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection