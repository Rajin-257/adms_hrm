@extends('layouts.app')

@section('title', 'Welcome to ADMS')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">
                    Smart Attendance Management System
                </h1>
                <p class="lead mb-4">
                    Streamline your workforce management with our advanced ZKTeco-integrated attendance tracking system. 
                    Monitor, manage, and analyze attendance data with ease.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">
                        <i class="bi bi-person-plus me-2"></i>Get Started
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="position-relative">
                    <i class="bi bi-clock-history" style="font-size: 15rem; opacity: 0.1;"></i>
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="bi bi-people-fill text-white" style="font-size: 4rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold mb-3">Why Choose ADMS?</h2>
                <p class="lead text-muted">
                    Our comprehensive attendance management solution offers everything you need to efficiently track and manage your workforce.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-device-hdd"></i>
                    </div>
                    <h4 class="fw-bold">ZKTeco Integration</h4>
                    <p class="text-muted">
                        Seamlessly connect with ZKTeco biometric devices for accurate and secure attendance tracking.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4 class="fw-bold">Real-time Analytics</h4>
                    <p class="text-muted">
                        Get instant insights into attendance patterns, late arrivals, and workforce productivity metrics.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-building"></i>
                    </div>
                    <h4 class="fw-bold">Multi-Branch Support</h4>
                    <p class="text-muted">
                        Manage multiple branches and locations from a single, centralized dashboard interface.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="fw-bold">Secure & Reliable</h4>
                    <p class="text-muted">
                        Enterprise-grade security with role-based access control and automatic session management.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h4 class="fw-bold">Time Tracking</h4>
                    <p class="text-muted">
                        Comprehensive time tracking with detailed logs, reports, and attendance history.
                    </p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h4 class="fw-bold">Easy Setup</h4>
                    <p class="text-muted">
                        Quick and easy setup process with intuitive configuration and device management.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-6 fw-bold mb-3">Ready to Get Started?</h2>
                <p class="lead text-muted mb-4">
                    Join thousands of organizations already using ADMS to streamline their attendance management.
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">
                        <i class="bi bi-rocket-takeoff me-2"></i>Start Free Trial
                    </a>
                    <a href="#features" class="btn btn-outline-primary btn-lg px-5">
                        <i class="bi bi-info-circle me-2"></i>Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card stats-card h-100 p-4">
                    <div class="card-body">
                        <i class="bi bi-building display-4 mb-3"></i>
                        <h3 class="fw-bold">500+</h3>
                        <p class="mb-0">Active Branches</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card success h-100 p-4">
                    <div class="card-body">
                        <i class="bi bi-people display-4 mb-3"></i>
                        <h3 class="fw-bold">10K+</h3>
                        <p class="mb-0">Users Managed</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card warning h-100 p-4">
                    <div class="card-body">
                        <i class="bi bi-device-hdd display-4 mb-3"></i>
                        <h3 class="fw-bold">1K+</h3>
                        <p class="mb-0">Devices Connected</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card info h-100 p-4">
                    <div class="card-body">
                        <i class="bi bi-clock-history display-4 mb-3"></i>
                        <h3 class="fw-bold">99.9%</h3>
                        <p class="mb-0">Uptime</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 