@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    {{-- <div class="mb-3">
                        <a href="{{ route('actionlogs.index') }}" class="btn btn-primary">
                            <i class="fa fa-comments" aria-hidden="true"></i> view Feedback
                        </a>
                    </div> --}}
                    <p>
                        <a href="{{ route('home') }}">MedHub</a> / Prescriptions
                    </p>
                    <div class="card-body">
                            {{-- <i class="fa fa-plus" aria-hidden="true"></i> Patient List --}}
                        </a>
                        <br/>
                        <br/>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>username</th> --}}
                                        <th>Patient Name</th>
                                        <th>Note</th>
                                        <th>Delivery Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prescriptions as $prescription)
                                        <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                            <td>{{ $prescription->user->name }}</td>
                                            <td>{{ $prescription->note }}</td>
                                            <td>{{ $prescription->delivery_address }}</td>
                                            <td>
                                                <a href="{{ route('prescriptionsShow', $prescription->id) }}" title="View Product">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col text-center">
            <a href="{{ route('actionlogs.index') }}" class="btn btn-primary">
                <i class="fa fa-comments" aria-hidden="true"></i> View Feedback
            </a>
        </div>
    </div>
</div>
@endsection



