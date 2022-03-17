@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                @auth

                @if (Auth::user()->activeSubscription)
                <div class="container text-center">
                    <div class="alert alert-info">
                        Welcome {{ Auth::user()->name }} Your are subscribed - {{ Auth::user()->activeSubscription->name }}
                    </div>
                </div>
                @endif
                @if (Session::has('failureMsg'))
                <div class="container  mt-4">
                    <div class="alert texgt-center alert-danger">
                        {{ Session::get('failureMsg') }}
                    </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
