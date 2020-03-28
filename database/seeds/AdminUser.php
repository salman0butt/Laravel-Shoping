<?php

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create([
            'name' => 'customer',
            'description' => 'Customer Role'
        ]);
        $role = Role::create([
            'name' => 'admin',
            'description' => 'Admin Role'
        ]);
            $user = User::create([
                'email' => 'admin@admin.com',
                'password' => bcrypt('secert'),
                'role_id' => $role->id
            ]);
        Profile::create([
            'user_id' => $user->id
        ]);

    }
}
