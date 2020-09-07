@extends ('layout')

@section ('content')

<div>
  <a href="/reservations">Back</a>
  <form method="POST" action="/reservations/{{ $reservation->id }}">
    @csrf
    @method('DELETE')

    <h2>{{ __('reservation.details') }}</h2>
    <h3>{{ __('reservation.check_in') }}  {{$reservation->check_in}}</h3>
    <h3>{{ __('reservation.check_out') }}  {{$reservation->check_out}}</h3>
    <h3>{{ __('reservation.price') }}  {{$reservation->total_price}}</h3>

    @if($reservation->canceled == 1)         
        <p><strong>{{__('reservation.canceled') }} </strong></p>
    @endif

    <ul>
      @foreach($reservation->room as $room)
      <li>
        <a href="/hotels/{{$room->hotel_id}}">
          <p> {{ $room->hotel->name}}</p>
          <p> {{ $room->hotel->address}}</p>
        </a>
        <a href="/rooms/{{$room->id}}">
          <h3> {{ $room->room_identifier }} </h3>
          <p> {{ $room->stars}}</p>
        </a>
      </li>
      @endforeach
    </ul>

  </form>
</div>


@endsection