@extends ('layout')

@section ('content')
<div>
  <h2>{{ __('reservation.create') }}</h2>
  <form method="POST" action="/reservations">
    @csrf

    <label for="name">{{ __('reservation.check_in') }}</label>
    <input
      id="check_in"
      name="check_in"
      type="date"
      value="{{ old('check_in') }}"
    />
    @error('check_in')
      <p cass="Form__error">{{ $errors->first('check_in') }}</p>
    @enderror

  <label for="name">{{ __('reservation.check_out') }}</label>
    <input
      id="check_out"
      name="check_out"
      type="date"
      value="{{ old('check_out') }}"
    />
    @error('check_out')
      <p cass="Form__error">{{ $errors->first('check_out') }}</p>
    @enderror
  
    <a onclick="searchRooms()" id="searchButton" class="btn btn-primary">Buscar quartos disponiveis</a>

      @foreach($rooms as $room)
        <input type="checkbox" id="room" name="rooms[]" value="{{ $room->id }}"/>
          <h3>Hotel: {{$room->hotel->name}}</h3>
          <p>{{__('hotel.address')}} {{$room->hotel->address}}</p>
          <h3>{{__('room.room')}} {{$room->room_identifier}}</h3>
          <p>$ {{$room->price}}</p>
      @endforeach
      @error('room')
      <p cass="Form__error">{{ $errors->first('room') }}</p>
    @enderror

    <button type="submit">{{ __('general.save') }}</button>
  </form>

</div>

<script>
window.onload = function() {
  const urlParams = new URLSearchParams(location.search);
  const checkInParam = urlParams.get('check_in');
  const checkOutParam = urlParams.get('check_in');

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