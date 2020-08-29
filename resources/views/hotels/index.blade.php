@extends ('layout')

@section ('content')
<div>
  <a href="/hotels/create">Add hotel</a>
  <h2>Hotels list:</h2>
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