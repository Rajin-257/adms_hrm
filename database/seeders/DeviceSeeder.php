<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devices = [
            [
                'nama' => 'Main Entrance Device',
                'no_sn' => 'ZKPH123456',
                'lokasi' => 'Main Entrance',
                'branch_id' => null,
                'online' => null,
            ],
            [
                'nama' => 'Office Floor Device',
                'no_sn' => 'ZKPH789012',
                'lokasi' => 'Second Floor Office',
                'branch_id' => null,
                'online' => null,
            ],
            [
                'nama' => 'Warehouse Device',
                'no_sn' => 'ZKPH345678',
                'lokasi' => 'Warehouse Entrance',
                'branch_id' => null,
                'online' => null,
            ],
            [
                'nama' => 'Admin Building Device',
                'no_sn' => 'ZKPH901234',
                'lokasi' => 'Admin Building',
                'branch_id' => null,
                'online' => null,
            ],
            [
                'nama' => 'Branch Office Device',
                'no_sn' => 'ZKPH567890',
                'lokasi' => 'Branch Office',
                'branch_id' => null,
                'online' => null,
            ]
        ];

        foreach ($devices as $device) {
            Device::create($device);
        }
    }
}
