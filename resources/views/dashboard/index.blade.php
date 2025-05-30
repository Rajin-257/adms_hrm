@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    <!-- Success/Info Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-1">Welcome back, {{ Auth::user()->name }}!</h2>
                            <p class="text-muted mb-0">
                                <i class="bi bi-person-badge me-1"></i>{{ ucfirst(Auth::user()->role) }}
                                @if(Auth::user()->branch)
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-building me-1"></i>{{ Auth::user()->branch->name }}
                                @endif
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-muted">
                                <i class="bi bi-clock me-1"></i>{{ now()->format('l, F j, Y') }}
                                <br>
                                <small>Last activity: {{ Auth::user()->last_activity->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        @if(Auth::user()->isSuperAdmin())
            <!-- Super Admin Stats -->
            <div class="col-md-3">
                <div class="card stats-card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-building display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['total_branches'] }}</h3>
                        <p class="mb-0">Total Branches</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card success h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['total_users'] }}</h3>
                        <p class="mb-0">Total Users</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card warning h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-device-hdd display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['total_devices'] }}</h3>
                        <p class="mb-0">Total Devices</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card stats-card info h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['total_attendances'] }}</h3>
                        <p class="mb-0">Total Attendances</p>
                    </div>
                </div>
            </div>
        @else
            <!-- Branch Admin Stats -->
            <div class="col-md-4">
                <div class="card stats-card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-device-hdd display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['branch_devices'] }}</h3>
                        <p class="mb-0">Branch Devices</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card stats-card success h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['branch_users'] }}</h3>
                        <p class="mb-0">Branch Users</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card stats-card info h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history display-4 mb-3"></i>
                        <h3 class="fw-bold">{{ $stats['branch_attendances'] }}</h3>
                        <p class="mb-0">Branch Attendances</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-lightning me-2"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('devices.index') }}" class="btn btn-outline-primary w-100 p-3">
                                <i class="bi bi-device-hdd display-6 d-block mb-2"></i>
                                <strong>Manage Devices</strong>
                                <br><small class="text-muted">View and configure devices</small>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="{{ route('devices.Attendance') }}" class="btn btn-outline-success w-100 p-3">
                                <i class="bi bi-person-check display-6 d-block mb-2"></i>
                                <strong>View Attendance</strong>
                                <br><small class="text-muted">Check attendance records</small>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="{{ route('devices.DeviceLog') }}" class="btn btn-outline-info w-100 p-3">
                                <i class="bi bi-journal-text display-6 d-block mb-2"></i>
                                <strong>Device Logs</strong>
                                <br><small class="text-muted">Monitor device activity</small>
                            </a>
                        </div>
                        
                        <div class="col-md-6">
                            <a href="{{ route('devices.FingerLog') }}" class="btn btn-outline-warning w-100 p-3">
                                <i class="bi bi-fingerprint display-6 d-block mb-2"></i>
                                <strong>Finger Logs</strong>
                                <br><small class="text-muted">View fingerprint data</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle me-2"></i>System Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>System Status:</strong>
                        <span class="badge bg-success ms-2">Online</span>
                    </div>
                    
                    <div class="mb-3">
                        <strong>Server Time:</strong>
                        <br><small class="text-muted">{{ now()->format('Y-m-d H:i:s T') }}</small>
                    </div>
                    
                    @if(Auth::user()->branch)
                        <div class="mb-3">
                            <strong>Branch Status:</strong>
                            <span class="badge bg-{{ Auth::user()->branch->status ? 'success' : 'danger' }} ms-2">
                                {{ Auth::user()->branch->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <strong>Session Timeout:</strong>
                        <br><small class="text-muted">30 minutes of inactivity</small>
                    </div>
                    
                    @if(Auth::user()->isSuperAdmin())
                        <div class="alert alert-info p-2 mt-3">
                            <small>
                                <i class="bi bi-shield-check me-1"></i>
                                You have super admin privileges
                            </small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity (placeholder for future implementation) -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-activity me-2"></i>Recent Activity
                    </h5>
                </div>
                <div class="card-body text-center py-5">
                    <i class="bi bi-clock-history display-1 text-muted mb-3"></i>
                    <h5 class="text-muted">No recent activity</h5>
                    <p class="text-muted">Activity logs will appear here once devices start sending data.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-refresh page every 5 minutes to keep session active
    setTimeout(function() {
        location.reload();
    }, 300000); // 5 minutes
</script>
@endpush
@endsection 