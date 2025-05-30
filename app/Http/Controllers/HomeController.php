<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branch;
use App\Models\Device;
use App\Models\Attendance;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('home.index');
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        if ($user->isSuperAdmin()) {
            $stats = [
                'total_branches' => Branch::count(),
                'total_users' => User::count(),
                'total_devices' => Device::count(),
                'total_attendances' => Attendance::count(),
            ];
        } else {
            $stats = [
                'branch_devices' => Device::where('branch_id', $user->branch_id)->count(),
                'branch_users' => User::where('branch_id', $user->branch_id)->count(),
                'branch_attendances' => Attendance::whereHas('device', function($query) use ($user) {
                    $query->where('branch_id', $user->branch_id);
                })->count(),
            ];
        }

        return view('dashboard.index', compact('stats'));
    }
}
