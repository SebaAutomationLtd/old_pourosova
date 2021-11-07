<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::whereEmail('superadmin@gmail.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456')
            ]);
        }
        
        $role = Role::whereName('Super Admin')->first();
        if (!$role) {
            $role = Role::create(['name' => 'Super Admin', 'bangla_name' => 'সুপার এডমিন']);
        }


        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
