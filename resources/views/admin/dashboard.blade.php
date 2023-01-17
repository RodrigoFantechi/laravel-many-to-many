@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body d-flex justify-content-between align-items-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <div class="image "><img class="rounded-circle" src="{{ Vite::asset('resources/img/avatar_5.jpg') }}" alt="la foto non si vede"></div>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

