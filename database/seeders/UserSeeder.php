<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin tổng quản (Super Admin)
        User::updateOrCreate(
            ['email' => 'admin@perfecthouse.vn'],
            [
                'name' => 'Admin Tổng Quản',
                'email' => 'admin@perfecthouse.vn',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Admin Gemlock
        User::updateOrCreate(
            ['email' => 'admin@gemlock.vn'],
            [
                'name' => 'Admin Gemlock',
                'email' => 'admin@gemlock.vn',
                'password' => Hash::make('password'),
                'role' => 'admin_genlock',
            ]
        );

        // Admin Gemsolar
        User::updateOrCreate(
            ['email' => 'admin@gemsolar.vn'],
            [
                'name' => 'Admin Gemsolar',
                'email' => 'admin@gemsolar.vn',
                'password' => Hash::make('password'),
                'role' => 'admin_gemsolar',
            ]
        );

        $this->command->info('Admin users seeded successfully!');
        $this->command->info('');
        $this->command->info('=== ADMIN TỔNG QUẢN ===');
        $this->command->info('Email: admin@perfecthouse.vn');
        $this->command->info('Password: password');
        $this->command->info('Role: admin (truy cập tất cả)');
        $this->command->info('');
        $this->command->info('=== ADMIN GEMLOCK ===');
        $this->command->info('Email: admin@gemlock.vn');
        $this->command->info('Password: password');
        $this->command->info('Role: admin_genlock');
        $this->command->info('');
        $this->command->info('=== ADMIN GEMSOLAR ===');
        $this->command->info('Email: admin@gemsolar.vn');
        $this->command->info('Password: password');
        $this->command->info('Role: admin_gemsolar');
    }
}
