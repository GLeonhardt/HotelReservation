@extends ('layout')

@section ('content')

<div>
  <a href="/hotels">Back</a>
  <form method="POST" action="/hotels/{{ $hotel->id }}">
    @csrf
    @method('DELETE')

    <h2>{{ $hotel->name }}</h2>
    <p> {{ $hotel->address}}</p>
    <a href="/hotels/{{ $hotel->id }}/edit">Edit</a>
    <button type="submit">Remove</button>
    @error('delete')
      <p cass="Form__error">{{ $errors->first('delete') }}</p>
    @enderror
  </form>
</div>


@endsection