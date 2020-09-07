@extends('layouts.app')

@section ('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('hotel.edit') }}</div>
        <div class="card-body">
          <form method="POST" action="/hotels/{{ $hotel->id }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('hotel.name') }}</label>
              <div class="col-md-6">
                <input id="name" name="name" type="text" value="{{ $hotel->name }}" class="form-control @error('name') is-invalid @enderror" required autocomplete="email" autofocus/>
                @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('hotel.address') }}</label>
              <div class="col-md-6">
                <input id="address" name="address" type="text" value="{{ $hotel->address }}" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" autofocus/>
                @error('address')
                  <p class="invalid-feedback">{{ $errors->first('address') }}</p>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">{{ __('general.update') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
