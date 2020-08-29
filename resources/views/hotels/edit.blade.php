@extends ('layout')

@section ('content')
<div>
  <h2>{{ __('hotel.edit') }}</h2>
  <form method="POST" action="/hotels/{{ $hotel->id }}">
    @csrf
    @method('PUT')

    <label for="name">{{ __('hotel.name') }}</label>
    <input
      id="name"
      name="name"
      type="text"
      value="{{ $hotel->name }}"
    />
    @error('name')
      <p cass="Form__error">{{ $errors->first('name') }}</p>
    @enderror
    <label for="address">{{ __('hotel.address') }}</label>
    <input
      id="address"
      name="address"
      type="text"
      value="{{ $hotel->address }}"
    />
    @error('address')
      <p cass="Form__error">{{ $errors->first('address') }}</p>
    @enderror
    <button type="submit">{{ __('general.update') }}</button>
  </form>

</div>


@endsection