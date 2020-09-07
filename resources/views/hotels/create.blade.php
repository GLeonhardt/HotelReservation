@extends('layouts.app')

@section ('content')
<div>
  <h2>{{ __('hotel.create') }}</h2>
  <form method="POST" action="/hotels">
    @csrf

    <label for="name">{{ __('hotel.name') }}</label>
    <input
      id="name"
      name="name"
      type="text"
      value="{{ old('name') }}"
    />
    @error('name')
      <p cass="Form__error">{{ $errors->first('name') }}</p>
    @enderror
    <label for="address">{{ __('hotel.address') }}</label>
    <input
      id="address"
      name="address"
      type="text"
      value="{{ old('address') }}"
    />
    @error('address')
      <p cass="Form__error">{{ $errors->first('address') }}</p>
    @enderror
    <button type="submit">{{ __('general.save') }}</button>
  </form>

</div>


@endsection