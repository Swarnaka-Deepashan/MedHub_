


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Prescription uploading form') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('prescriptions.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="row">
                                <label for="images" class="col-md-4 col-form-label text-md-end">{{ __('Upload Images') }}</label>
                                <div class="col-md-6">
                                    <input type="file" id="images" class="form-control @error('images') is-invalid @enderror" name="images[]" multiple>
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('note') is-invalid @enderror" name="note" placeholder="Any notes.." value="{{ old('note') }}">
                            @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <input type="text" class="form-control @error('delivery_address') is-invalid @enderror" name="delivery_address" placeholder="Delivery Address" value="{{ old('delivery_address') }}">
                            @error('delivery_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary">Upload Prescription</button>
                            <a href="{{ url('/quotations/index') }}" class="btn btn-secondary">Recieved Quotations</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



















