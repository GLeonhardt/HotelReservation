@extends('layouts.app')

@section ('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <a href="/hotels">{{ __('general.back') }}</a>
      <div class="card mt-2 p-2">
        <form method="POST" action="/hotels/{{ $hotel->id }}">
          @csrf
          @method('DELETE')
          <h2>{{ $hotel->name }}</h2>
          <p> {{ $hotel->address}}</p>
          <a href="/hotels/{{ $hotel->id }}/edit" class="btn btn-small btn-primary">{{ __('general.edit') }}</a>
          <button type="submit" class="btn btn-small btn-danger">{{ __('general.remove') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
