@extends ('layouts.app')

@section ('content')

<div class="content">
    <div class="title m-b-md">
        {{ __('general.title') }}
    </div>

    <div class="links">
        <a href="/home" class="btn btn-secondary" >{{ __('general.reserve') }}</a>
    </div>
</div>

@endsection