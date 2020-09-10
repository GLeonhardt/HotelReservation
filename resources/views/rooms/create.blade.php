@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create room</div>
        <div class="card-body">
          <form method="POST" action="/rooms">
            @csrf
            <div class="form-group row">
              <label for="room_identifier" class="col-md-4 col-form-label text-md-right">{{ __('room.identifier') }}</label>
              <div class="col-md-6">
                <input id="room_identifier" name="room_identifier" type="text" value="{{ old('room_identifier') }}" class="form-control @error('room_identifier') is-invalid @enderror" required autofocus/>
                @error('room_identifier')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('room.price') }}</label>
              <div class="col-md-6">
                <input id="price" name="price" type="number" min="1" step="any" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" required autofocus/>
                @error('price')
                <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="stars" class="col-md-4 col-form-label text-md-right">{{ __('room.rating') }}</label>
              <div class="col-md-6">
                <select name="stars" id="stars" class="form-control">
                  <option value="1" selected>1 {{ __('room.star') }}</option>
                  <option value="2">2 {{ __('room.stars') }}</option>
                  <option value="3">3 {{ __('room.stars') }}</option>
                  <option value="4">4 {{ __('room.stars') }}</option>
                  <option value="5">5 {{ __('room.stars') }}</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="stars" class="col-md-4 col-form-label text-md-right">{{ __('room.hotel') }}</label>
              <div class="col-md-6">
                <select name="hotel_id" id="hotel_id" class="form-control">
                    @foreach($hotels as $hotel)
                        <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                    @endforeach
                </select>
                @error('hotel_id')
                  <p cass="Form__error">{{ $errors->first('hotel_id') }}</p>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">{{ __('general.save')}}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection