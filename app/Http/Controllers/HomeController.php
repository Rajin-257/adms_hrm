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
            // Check if branch user has any devices
            $branchDevices = Device::where('branch_id', $user->branch_id)->count();
            
            if ($branchDevices == 0) {
                // Redirect to device setup if no devices found
                return redirect()->route('device.setup')->with('info', 'Please add a device to your branch to continue.');
            }
            
            $stats = [
                'branch_devices' => $branchDevices,
                'branch_users' => User::where('branch_id', $user->branch_id)->count(),
                'branch_attendances' => Attendance::whereHas('device', function($query) use ($user) {
                    $query->where('branch_id', $user->branch_id);
                })->count(),
            ];
        }

        return view('dashboard.index', compact('stats'));
    }

    public function showDeviceSetup()
    {
        $user = Auth::user();
        
        // Only allow non-superadmin users to access this
        if ($user->isSuperAdmin()) {
            return redirect()->route('dashboard');
        }

        return view('device.setup');
    }

    public function setupDevice(Request $request)
    {
        $user = Auth::user();
        
        // Only allow non-superadmin users
        if ($user->isSuperAdmin()) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'serial_number' => 'required|string|max:255'
        ]);

        $serialNumber = trim($request->input('serial_number'));

        // Check if device with this serial exists in database
        $device = Device::where('no_sn', $serialNumber)->first();

        if (!$device) {
            return back()->withErrors([
                'serial_number' => 'Device with serial number "' . $serialNumber . '" not found in our database. Please check the serial number and try again.'
            ])->withInput();
        }

        // Check if device is already assigned to another branch
        if ($device->branch_id && $device->branch_id != $user->branch_id) {
            return back()->withErrors([
                'serial_number' => 'This device is already assigned to another branch. Please contact administrator.'
            ])->withInput();
        }

        // Assign device to user's branch
        $device->update([
            'branch_id' => $user->branch_id
        ]);

        return redirect()->route('dashboard')->with('success', 'Device successfully added to your branch!');
    }
}
