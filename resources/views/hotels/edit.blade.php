@extends ('layout')

@section ('content')
<div>
  <h2>Edit hotel</h2>
  <form method="POST" action="/hotels/{{ $hotel->id }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input
      id="name"
      name="name"
      type="text"
      value="{{ $hotel->name }}"
    />
    @error('name')
      <p cass="Form__error">{{ $errors->first('name') }}</p>
    @enderror
    <label for="address">Address:</label>
    <input
      id="address"
      name="address"
      type="text"
      value="{{ $hotel->address }}"
    />
    @error('address')
      <p cass="Form__error">{{ $errors->first('address') }}</p>
    @enderror
    <button type="submit">Update</button>
  </form>

</div>


@endsection