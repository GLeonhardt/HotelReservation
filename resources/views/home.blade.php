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
                          <a href="/hotels" class="cta">Hotels</a>
                          <a href="/rooms" class="cta">Rooms</a>
                        @endif
                        <a href="/" class="cta">Reservations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
