@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div style="margin-bottom: 20px; text-align:center;">
                    {{ __('You are logged in as ').$user->name }}
                </div>
                   
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href={{ route('user.book.car')}}>
                            <button id="carBooking" class="btn btn-primary btn-md center-block" Style="width: 200px; margin-right:20px;" OnClick="btnSearch_Click" >Book Car</button>
                        </a>
                        <a href={{ route('user.track.progress') }}>
                             <button id="trackBooking" class="btn btn-danger btn-md center-block" Style="width: 200px;" OnClick="btnClear_Click" >Track your booking</button>
                            </a>
                            </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
