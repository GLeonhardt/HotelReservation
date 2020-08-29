@extends ('layout')

@section ('content')
<div>
  <h2>Create hotel</h2>
  <form method="POST" action="/hotels">
    @csrf

    <label for="name">Name:</label>
    <input
      id="name"
      name="name"
      type="text"
      value="{{ old('name') }}"
    />
    @error('name')
      <p cass="Form__error">{{ $errors->first('name') }}</p>
    @enderror
    <label for="address">Address:</label>
    <input
      id="address"
      name="address"
      type="text"
      value="{{ old('address') }}"
    />
    @error('address')
      <p cass="Form__error">{{ $errors->first('address') }}</p>
    @enderror
    <button type="submit">Save</button>
  </form>

</div>


@endsection