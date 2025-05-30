@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-8 col-lg-6">
            <div class="card register-card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-person-plus me-2"></i>Create Your Account
                    </h4>
                    <p class="mb-0 mt-2 opacity-75">Register and create your branch</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="bi bi-person me-2"></i>Personal Information
                                </h5>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    <i class="bi bi-person me-1"></i>Full Name
                                </label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autocomplete="name" 
                                       autofocus
                                       placeholder="Enter your full name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-1"></i>Email Address
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email"
                                       placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock me-1"></i>Password
                                </label>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="new-password"
                                       placeholder="Enter password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation" class="form-label">
                                    <i class="bi bi-lock-fill me-1"></i>Confirm Password
                                </label>
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password"
                                       placeholder="Confirm password">
                            </div>
                        </div>

                        <!-- Branch Information -->
                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="bi bi-building me-2"></i>Branch Information
                                </h5>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="branch_name" class="form-label">
                                <i class="bi bi-building me-1"></i>Branch Name
                            </label>
                            <input type="text" 
                                   class="form-control @error('branch_name') is-invalid @enderror" 
                                   id="branch_name" 
                                   name="branch_name" 
                                   value="{{ old('branch_name') }}" 
                                   required
                                   placeholder="Enter branch name">
                            @error('branch_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="branch_address" class="form-label">
                                <i class="bi bi-geo-alt me-1"></i>Branch Address
                            </label>
                            <textarea class="form-control @error('branch_address') is-invalid @enderror" 
                                      id="branch_address" 
                                      name="branch_address" 
                                      rows="3"
                                      placeholder="Enter branch address">{{ old('branch_address') }}</textarea>
                            @error('branch_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="branch_phone" class="form-label">
                                    <i class="bi bi-telephone me-1"></i>Branch Phone
                                </label>
                                <input type="text" 
                                       class="form-control @error('branch_phone') is-invalid @enderror" 
                                       id="branch_phone" 
                                       name="branch_phone" 
                                       value="{{ old('branch_phone') }}"
                                       placeholder="Enter branch phone">
                                @error('branch_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="branch_email" class="form-label">
                                    <i class="bi bi-envelope-at me-1"></i>Branch Email
                                </label>
                                <input type="email" 
                                       class="form-control @error('branch_email') is-invalid @enderror" 
                                       id="branch_email" 
                                       name="branch_email" 
                                       value="{{ old('branch_email') }}"
                                       placeholder="Enter branch email">
                                @error('branch_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-rocket-takeoff me-2"></i>Create Account & Branch
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-light">
                    <p class="mb-0">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary fw-bold">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 