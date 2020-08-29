@extends ('layout')

@section ('content')
<div>
  <h2>Create room</h2>
  <form method="POST" action="/rooms">
    @csrf

    <label for="name">Room Identifier:</label>
    <input
      id="room_identifier"
      name="room_identifier"
      type="text"
      value="{{ old('room_identifier') }}"
    />
    @error('room_identifier')
      <p cass="Form__error">{{ $errors->first('room_identifier') }}</p>
    @enderror

    <label for="stars">Number of stars:</label>

    <select name="stars" id="stars">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    @error('stars')
      <p cass="Form__error">{{ $errors->first('stars') }}</p>
    @enderror

    <button type="submit">Save</button>
  </form>

</div>


@endsection