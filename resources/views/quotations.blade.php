@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Create Quotation</h3>
                </div>
                <div class="card-body bg-light">
                    {{-- Display selected prescription image --}}
                    <div class="selected-prescription mb-3">
                        <img src="default-image-path" alt="Prescription Image" class="img-fluid rounded">
                    </div>

                    {{-- Display prescription images as a row --}}
                    <div class="prescription-images d-flex flex-row mb-4">
                        @foreach ($prescriptions as $prescription)
                            @foreach (json_decode($prescription->image_paths) as $image)
                                <img src="{{ Storage::url($image) }}" alt="Prescription Image" class="prescription-thumb mr-2 rounded" style="width: 100px; height: auto; cursor: pointer;" data-id="{{ $prescription->id }}">
                            @endforeach
                        @endforeach
                    </div>

                    {{-- Quotation form --}}
                    <form id="add-drug-form" action="{{ route('quotations.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        {{-- Include prescription ID in form --}}
                        <input type="hidden" name="prescription_id" id="prescriptionIdInput" value="">
                        <div class="form-row">
                            <div class="col-md-5 mb-3">
                                <input type="text" name="drug" class="form-control" placeholder="Drug" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="addDrug" class="btn btn-secondary btn-block">Add</button>
                            </div>
                        </div>

                        <div class="added-drugs mb-4">
                            {{-- Added drugs will be listed here --}}
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Send Quotation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Enlarge the clicked prescription image and set the prescription ID
        $('.prescription-images img').on('click', function() {
            var src = $(this).attr('src');
            var prescriptionId = $(this).data('id');
            $('.selected-prescription img').attr('src', src);
            $('#prescriptionIdInput').val(prescriptionId);
        });

        // Handle adding drug and quantity to list
        $('#addDrug').on('click', function() {
            var drug = $('input[name="drug"]').val();
            var quantity = $('input[name="quantity"]').val();
            var amount = calculateAmount(drug, quantity); // Implement this function based on your logic

            // Append to the list
            $('.added-drugs').append('<div class="alert alert-secondary" role="alert">' + drug + ' - ' + quantity + ' - ' + amount + '</div>');

            // Clear the input fields
            $('input[name="drug"]').val('');
            $('input[name="quantity"]').val('');
        });

        // Function to calculate the amount
        function calculateAmount(drug, quantity) {
            // Your logic here
            return 0; // Placeholder
        }
    });
</script>
@endpush
