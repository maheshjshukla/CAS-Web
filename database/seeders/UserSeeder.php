<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::count()==0) {
            $userList = [
            ['role_id' => 1, 'client_id' => 1, 'name' => 'Admin istrator', 'email' => 'admin@admin.com', 'password' => Hash::make('password'), 'status' => 'active']
            ];
            
            foreach($userList as $user) {
                $user = User::create($user);
            }

        }
    }
}
