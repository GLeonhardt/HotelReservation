@extends ('layouts.app')

@section ('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/reservations">{{ __('general.back') }}</a>
      <div class="card mt-2 p-2">
        <form method="POST" action="/reservations/{{ $reservation->id }}">
          @csrf
          @method('DELETE')
          <h2>{{ $reservation->user->name }}</h2>
          <p>{{ __('reservation.check_in') }}  {{$reservation->check_in}}</p>
          <p>{{ __('reservation.check_out') }}  {{$reservation->check_out}}</p>
          <p>{{ __('reservation.price') }}  {{$reservation->total_price}}</p>

          @if($reservation->canceled == 1)         
              <p><strong>{{__('reservation.canceled') }} </strong></p>
          @endif
          
          @foreach($reservation->room as $room)
          <div class="card mt-2 p-2">
            <p>{{ __('hotel.name') }} {{ $room->hotel->name}}</p>
            <p>{{ __('hotel.address') }} {{ $room->hotel->address}}</p>
            <p>{{ __('room.identifier') }} {{ $room->room_identifier }} </p>
            <p>{{ __('room.stars') }} {{ $room->stars}}</p>
          </div>
          @endforeach

          @if($reservation->canceled == 0)
            <button type="submit" class="btn btn-small btn-danger">{{ __('reservation.cancel') }}</button>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>


@endsection