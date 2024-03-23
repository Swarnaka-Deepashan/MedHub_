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

                    @auth
                        {{ __('You are logged in!') }} <br>

                        <div class="text-center">
                            <a href="{{ url('/upload-prescription') }}" class="btn btn-primary mb-2">Upload more prescriptions</a><br>
                            <a href="{{ url('/quotations/index') }}" class="btn btn-primary">Recieved Quotations</a>
                        </div>
                        
                        



                    @else
                        <div class="alert alert-warning" role="alert">
                            You are not logged in. 
                            <a href="{{ url('/welcome') }}" class="btn btn-primary">Go to Welcome Page</a> 
                        </div>  
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
