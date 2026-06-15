<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $email = 'admin@smartkids.com';
        // Bcrypt hash for 'password123'
        $password = bcrypt('password123');
        $uuid = Str::uuid()->toString();

        try {
            // Check if user already exists in auth.users
            $exists = DB::table('auth.users')->where('email', $email)->first();
            
            if ($exists) {
                $uuid = $exists->id;
                $this->command->info("User already exists in auth.users with UUID: {$uuid}");
            } else {
                DB::table('auth.users')->insert([
                    'id' => $uuid,
                    'instance_id' => '00000000-0000-0000-0000-000000000000',
                    'aud' => 'authenticated',
                    'role' => 'authenticated',
                    'email' => $email,
                    'encrypted_password' => $password,
                    'email_confirmed_at' => now(),
                    'raw_app_meta_data' => json_encode(['provider' => 'email', 'providers' => ['email']]),
                    'raw_user_meta_data' => json_encode([]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $this->command->info("Created user in auth.users with UUID: {$uuid}");
            }

            // Insert/update public.user_profiles
            DB::table('user_profiles')->updateOrInsert(
                ['id' => $uuid],
                [
                    'name' => 'Sri Handayani',
                    'role' => 'superadmin',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
            $this->command->info("Created/Updated profile in user_profiles successfully.");

        } catch (\Exception $e) {
            $this->command->error("Failed to seed admin user: " . $e->getMessage());
        }
    }
}
