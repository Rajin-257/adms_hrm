@extends('layouts.app')

@section('title', 'Device Setup')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-device-hdd me-2"></i>Device Setup Required
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Welcome to your branch dashboard!</strong><br>
                        To get started, please add a device to your branch by entering the device serial number below.
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('device.setup.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="serial_number" class="form-label">
                                <strong>Device Serial Number</strong>
                            </label>
                            <input 
                                type="text" 
                                class="form-control form-control-lg @error('serial_number') is-invalid @enderror" 
                                id="serial_number" 
                                name="serial_number" 
                                value="{{ old('serial_number') }}"
                                placeholder="Enter device serial number (e.g., ZKPH123456)"
                                required
                                autofocus
                            >
                            <div class="form-text">
                                <i class="bi bi-lightbulb me-1"></i>
                                The serial number is usually found on a label on the device itself.
                            </div>
                            @error('serial_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-plus-circle me-2"></i>Add Device
                            </button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="text-muted">
                        <h6>Instructions:</h6>
                        <ol class="small">
                            <li>Locate the device serial number on your ZKTeco device</li>
                            <li>Enter the exact serial number in the field above</li>
                            <li>Click "Add Device" to register it to your branch</li>
                            <li>If the device is not found, please contact your administrator</li>
                        </ol>
                    </div>

                    <div class="alert alert-warning mt-3" role="alert">
                        <i class="bi bi-shield-exclamation me-2"></i>
                        <strong>Note:</strong> Only devices that have been pre-registered in the system can be added to your branch.
                    </div>
                </div>
            </div>

            <!-- Branch Information Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-building me-2"></i>Branch Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Branch Name:</strong><br>
                            <span class="text-muted">{{ Auth::user()->branch->name }}</span>
                        </div>
                        @if(Auth::user()->branch->address)
                        <div class="col-md-6">
                            <strong>Address:</strong><br>
                            <span class="text-muted">{{ Auth::user()->branch->address }}</span>
                        </div>
                        @endif
                    </div>
                    @if(Auth::user()->branch->phone || Auth::user()->branch->email)
                    <hr>
                    <div class="row">
                        @if(Auth::user()->branch->phone)
                        <div class="col-md-6">
                            <strong>Phone:</strong><br>
                            <span class="text-muted">{{ Auth::user()->branch->phone }}</span>
                        </div>
                        @endif
                        @if(Auth::user()->branch->email)
                        <div class="col-md-6">
                            <strong>Email:</strong><br>
                            <span class="text-muted">{{ Auth::user()->branch->email }}</span>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-focus on the serial number input
    document.addEventListener('DOMContentLoaded', function() {
        const serialInput = document.getElementById('serial_number');
        if (serialInput) {
            serialInput.focus();
        }
    });

    // Format serial number input (uppercase)
    document.getElementById('serial_number').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
</script>
@endpush
@endsection 