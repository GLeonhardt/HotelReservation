@extends('layouts.app')

@section ('content')
<div>
  <a href="/hotels/create">{{ __('hotel.add') }}</a>
  <h2>{{ __('hotel.list') }}</h2>
  <ul>
    @foreach($hotels as $hotel)
    <li>
      <a href="/hotels/{{$hotel->id}}">
        <h3> {{ $hotel->name }} </h3>
        <p> {{ $hotel->address}}</p>
      </a>
    </li>
    @endforeach
  </ul>
</div>


@endsection