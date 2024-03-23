


@extends('layouts.app')

@section('content')
<div class="container">
    @if ($actionlogs->isEmpty())
        <div class="alert alert-info" role="alert">
            No feedbacks received yet.
        </div>
        <div class="text-center">
            {{-- <a href="{{ url('/prescriptions/index') }}" class="btn btn-primary">Back</a> --}}
        </div>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>Patient</th>
                        <th>Status</th>
                        {{-- <th>Description</th> --}}
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actionlogs as $log)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $log->user->name  }}</td>
                        <td>{{ $log->action }}</td>
                        {{-- <td>{{ $log->description }}</td> --}}
                        <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="text-center mt-4"> <!-- Add margin top for spacing -->
        {{-- <a href="{{ url('/prescriptions/index') }}" class="btn btn-primary">Back</a> --}}
    </div>
</div>
@endsection
