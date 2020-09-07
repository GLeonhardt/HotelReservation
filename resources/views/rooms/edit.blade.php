@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('room.edit') }}</div>
        <div class="card-body">
          <form method="POST" action="/rooms/{{ $room->id }}">
            @csrf
            @method('PUT')
            
            <div class="form-group row">
              <label for="room_identifier" class="col-md-4 col-form-label text-md-right">{{ __('room.identifier') }}</label>
              <div class="col-md-6">
                <input id="room_identifier" name="room_identifier" type="text" value="{{ $room->room_identifier }}" class="form-control @error('room_identifier') is-invalid @enderror" required autofocus/>
                @error('room_identifier')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="stars" class="col-md-4 col-form-label text-md-right">{{ __('room.rating') }}</label>
              <div class="col-md-6">
                <select name="stars" id="stars" class="form-control">
                  <option value="{{$room->stars}}">{{$room->stars}} {{ __('room.stars') }}</option>
                  <option value="1">1 {{ __('room.star') }}</option>
                  <option value="2">2 {{ __('room.stars') }}</option>
                  <option value="3">3 {{ __('room.stars') }}</option>
                  <option value="4">4 {{ __('room.stars') }}</option>
                  <option value="5">5 {{ __('room.stars') }}</option>
                </select>
              </div>
            </div>
            <input
              id="hotel_id"
              name="hotel_id"
              type="hidden"
              value="{{ $room->hotel_id }}"
            />
            <button type="submit" class="btn btn-primary float-right">{{ __('general.update')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


