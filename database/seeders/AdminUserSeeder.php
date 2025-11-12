<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@phoenix.local')->exists()) {
            User::create([
                'name' => 'Phoenix Admin',
                'email' => 'admin@phoenix.local',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'active'
            ]);
        }
    }
}
