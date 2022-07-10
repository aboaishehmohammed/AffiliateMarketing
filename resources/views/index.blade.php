@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <canvas id="canvas" height="280" width="600"></canvas>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center fw-bold">
                @auth
                    @if(auth()->user()->role==0)
                        {{__('Welcome to Your Wallet')}}
                    @endif
                @endauth
@guest

                        {{__('Welcome to Affiliate Marketing App')}}

                    @endguest
            </div>
        </div>
    </div>
@endsection
