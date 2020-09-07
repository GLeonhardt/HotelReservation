@extends('layouts.app')

@section ('content')

<div>
  <a href="/hotels">{{ __('general.back') }}</a>
  <form method="POST" action="/hotels/{{ $hotel->id }}">
    @csrf
    @method('DELETE')

    <h2>{{ $hotel->name }}</h2>
    <p> {{ $hotel->address}}</p>
    <a href="/hotels/{{ $hotel->id }}/edit">{{ __('general.edit') }}</a>
    <button type="submit">{{ __('general.remove') }}</button>
    @error('delete')
      <p cass="Form__error">{{ $errors->first('delete') }}</p>
    @enderror
  </form>
</div>


@endsection