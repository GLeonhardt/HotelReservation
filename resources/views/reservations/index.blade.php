@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/home">{{ __('general.back') }}</a>
      <!-- <a href="/hotels/create" class="btn btn-primary float-right" >{{ __('hotel.add') }}</a> -->
      <h2>{{ __('reservation.list') }}</h2>
      @foreach($reservations as $reservation)
      <a href="/reservations/{{$reservation->id}}">
        <div class="card mt-2 p-2">
          <h3> {{ $reservation->user->name }} </h3>
          <p>{{ __('reservation.check_in') }} {{ $reservation->check_in}}</p>
          <p>{{ __('reservation.check_out') }} {{ $reservation->check_out}}</p>
          <p>${{ $reservation->total_price}}</p>

          @if($reservation->canceled == 1)         
              <p><strong>{{__('reservation.canceled') }} </strong></p>
          @endif
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>


@endsection