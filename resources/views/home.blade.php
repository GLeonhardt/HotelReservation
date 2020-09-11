@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <div class="links">
                        @if (Auth::user()->admin)
                          <a href="/hotels" class="btn btn-primary" >{{ __('general.hotels') }}</a>
                          <a href="/rooms" class="btn btn-primary" >{{ __('general.rooms') }}</a>
                        @endif
                        <a href="/reservations" class="btn btn-primary" >{{ __('general.reservations') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
