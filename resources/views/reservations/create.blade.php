@extends('layouts.app')

@section ('content')
<div>
  <h2>{{ __('reservation.create') }}</h2>
  <form method="POST" action="/reservations">
    @csrf

    <label for="check_in" class="col-md-4 col-form-label text-md-right">{{ __('reservation.check_in') }}</label>
    <input
      id="check_in"
      name="check_in"
      type="date"
      value="{{ old('check_in') }}"
    />
    @error('check_in')
      <p cass="Form__error">{{ $errors->first('check_in') }}</p>
    @enderror

  <label for="check_out" class="col-md-4 col-form-label text-md-right">{{ __('reservation.check_out') }}</label>
    <input
      id="check_out"
      name="check_out"
      type="date"
      value="{{ old('check_out') }}"
    />
    @error('check_out')
      <p cass="Form__error">{{ $errors->first('check_out') }}</p>
    @enderror
  
    <a onclick="searchRooms()" id="searchButton" class="btn btn-primary float-right">{{ __('reservation.search') }}</a>

      @foreach($rooms as $room)
      <div class="form-group row">
          <div class="col-md-6">
            <label for="room" >{{ __('reservation.select') }}</label>
            <input type="checkbox" id="room" name="rooms[]" value="{{ $room->id }}"/>
            <h3> {{ __('room.rating') }}: {{ $room->stars}} {{ __('room.stars') }} ${{$room->price}}</h3>
            <p>{{__('hotel.name')}} {{$room->hotel->name}} - </p>
            <p>{{__('hotel.address')}} {{$room->hotel->address}}</p>
            <p>{{__('room.identifier')}} {{$room->room_identifier}}</p>
            <p></p>
          </div>
      </div>
      @endforeach
      @error('room')
      <p cass="Form__error">{{ $errors->first('room') }}</p>
    @enderror

    <button type="submit" class="btn btn-primary float-right">{{ __('general.save') }}</button>
  </form>

</div>

<script>
window.onload = function() {
  const urlParams = new URLSearchParams(location.search);
  const checkInParam = urlParams.get('check_in');
  const checkOutParam = urlParams.get('check_out');

  if(checkInParam != null && checkOutParam != null){
    var a = document.getElementById('check_in');
    a.value = checkInParam;
    var b = document.getElementById('check_out');
    b.value = checkOutParam;
  }
};

  function searchRooms(){
      let searchButton = document.getElementById('searchButton');
      let checkIn = document.getElementById('check_in').value;
      let checkOut = document.getElementById('check_out').value;
      searchButton.setAttribute("href", "/reservations/create?check_in="+ checkIn+"&check_out="+checkOut);
  }
</script>
@endsection