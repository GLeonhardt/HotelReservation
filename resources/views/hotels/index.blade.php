@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/home">{{ __('general.back') }}</a>
      <a href="/hotels/create" class="btn btn-primary float-right" >{{ __('hotel.add') }}</a>
      <h2>{{ __('hotel.list') }}</h2>
      @foreach($hotels as $hotel)
      <a href="/hotels/{{$hotel->id}}">
        <div class="card mt-2 p-2">
          <h3> {{ $hotel->name }} </h3>
          <p> {{ $hotel->address}}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</div>


@endsection