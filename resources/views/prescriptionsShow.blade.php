{{-- @extends('layouts.app')

@section('content')
    <<div class="container">
       <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card p-4">
            <p>
                <a href="{{ route('home') }}">Home</a> / 
                <a href="{{ route('prescriptionsIndex') }}">prescriptions</a>/ {{ ucfirst($prescription->user_id) }}
            </p>
            <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('prescriptionsIndex') }}"> Back</a>
            </div>
            <br>
                <div class="card">
                    <div class="card-header">{{ ucfirst($prescription->user_id) }} </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/image/{{ $prescription->image_paths }}" alt="{{ $prescription->user_id }}" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">Name: {{ $prescription->user_id }}</p>
                                <p class="card-text">Price: {{ $prescription->note }}</p>
                                <p class="card-text">Description: {{ $prescription->delivery_address }}</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 --}}



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <p>
                    {{-- <a href="{{ route('home') }}">Home</a> / 
                    <a href="{{ route('prescriptionsIndex') }}">prescriptions</a>/ {{ ucfirst($prescription->user_id) }} --}}
                </p>
                <div class="pull-right">
                    {{-- <a class="btn btn-primary" href="{{ route('prescriptionsIndex') }}"> Back</a> --}}
                </div>
                <br>
                <div class="card">
                    {{-- <div class="card-header">{{ ucfirst($prescription->user_id) }} </div> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if($prescription->image_paths)
                                    @php $images = json_decode($prescription->image_paths, true); @endphp
                                    @foreach($images as $image)
                                        <img src="{{ Storage::url($image) }}" alt="Prescription Image" class="img-fluid">
                                    @endforeach
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{-- <p class="card-text">Patient_id: {{ $prescription->user_id }}</p> --}}
                                <p class="card-text">Note: {{ $prescription->note }}</p>
                                <p class="card-text">Delivery Address: {{ $prescription->delivery_address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form id="quotationForm" action="/quotation" method="POST">
                    @csrf
                    <input type="hidden" name="prescription_id" value="{{ $prescription->id }}">
                    
                    <div class="form-group">
                        <label for="drug">Drug Name:</label>
                        <input type="text" class="form-control" id="drug" name="drug" placeholder="Enter drug name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="unit_price">Unit Price:</label>
                        <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Enter unit price" required>
                    </div>

                    <input type="hidden" name="total_price" id="total_price" value="">

                    <button type="submit" id="addDrugButton" class="btn btn-info">Add</button>
                    <a href="{{ route('prescriptionsIndex', $prescription->id) }}" class="btn btn-success">Finish</a>


                    {{-- <button type="button" id="addDrugButton" class="btn btn-info">Add</button> --}}
                </form>

                <script>
                    // Example JavaScript to calculate total_price
                    document.getElementById('quantity').addEventListener('input', updateTotalPrice);
                    document.getElementById('unit_price').addEventListener('input', updateTotalPrice);
                    
                    function updateTotalPrice() {
                        const quantity = parseFloat(document.getElementById('quantity').value) || 0;
                        const unitPrice = parseFloat(document.getElementById('unit_price').value) || 0;
                        const totalPrice = quantity * unitPrice;
                        document.getElementById('total_price').value = totalPrice.toFixed(2); // Assuming you want to round to 2 decimal places
                    }
                </script>
            </div>
        </div>
    </div>
</div>

@endsection
