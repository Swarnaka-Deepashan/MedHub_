{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card ">
                    <p>
                        <a href="{{ route('home') }}">MedHub</a> / Your quotations
                    </p>
                    <div class="card-body">
                            <i class="fa fa-plus" aria-hidden="true"></i> Patient List
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
                                        <th>prescription_id</th>
                                        <th>Drug</th>
                                        <th>quantity</th>
                                        <th>unit price</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($quotations as $quotation)
                                        <tr>
                                            <td>{{ $quotation->prescription_id }}</td>
                                            <td>{{ $quotation->drug }}</td>
                                            <td>{{ $quotation->quantity }}</td>
                                            <td>{{ $quotation->unit_price }}</td>
                                            <td>{{ $quotation->total_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody>
                                    @php $finalTotal = 0; @endphp
                                    @foreach($quotations as $quotation)
                                        <tr>
                                            <!-- ... table rows ... -->
                                            @php $finalTotal += $quotation->total_price; @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                <strong>Total Price: </strong>
                                {{ number_format($finalTotal, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Accept/Reject Buttons -->
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-center">
                <!-- Accept Button -->
                <form action="{{ route('quotations.accept') }}" method="POST" style="display: inline-block; margin-right: 10px;">
                    @csrf
                    <button type="submit" class="btn btn-success mb-2">Accept</button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('quotations.reject') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2">Reject</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}

                                        {{-- <th>username</th> --}}
                                            {{-- <td>{{ $loop->iteration }}</td> --}}





@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <p>
                    <a href="{{ route('home') }}">MedHub</a> / Your quotations
                </p>
                <div class="card-body">
                    {{-- <i class="fa fa-plus" aria-hidden="true"></i> Patient List --}}
                    <br/><br/>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($quotations->isEmpty())
                        <div class="alert alert-info" role="alert">
                            No quotations to display.
                        </div>
                        <div class="text-center">
                            <a href="{{ url('/upload-prescription') }}" class="btn btn-primary">Back</a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>Prescription ID</th> --}}
                                        <th>Drug</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Price for the drug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $finalTotal = 0; @endphp
                                    @foreach($quotations as $quotation)
                                        <tr>
                                            {{-- <td>{{ $quotation->prescription_id }}</td> --}}
                                            <td>{{ $quotation->drug }}</td>
                                            <td>{{ $quotation->quantity }}</td>
                                            <td>{{ $quotation->unit_price }}</td>
                                            <td>{{ $quotation->total_price }}</td>
                                            @php $finalTotal += $quotation->total_price; @endphp
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                <strong>Total Price: </strong>
                                {{ number_format($finalTotal, 2) }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (!$quotations->isEmpty())
    <!-- Accept/Reject Buttons -->
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 text-center">
                <!-- Accept Button -->
                <form action="{{ route('quotations.accept') }}" method="POST" style="display: inline-block; margin-right: 10px;">
                    @csrf
                    <button type="submit" class="btn btn-success mb-2">Accept</button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('quotations.reject') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger mb-2">Reject</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
