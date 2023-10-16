<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
        ]);

        $models = ['Aid', 'Convoy', 'Export'];
        $role_user = Role::findByName('user');
        foreach ($models as $model) {
            Permission::insert([
                ['name' => 'viewAny ' . $model, 'guard_name' => 'web'],
                ['name' => 'view ' . $model, 'guard_name' => 'web'],
                ['name' => 'create ' . $model, 'guard_name' => 'web'],
                ['name' => 'update ' . $model, 'guard_name' => 'web'],
                ['name' => 'delete ' . $model, 'guard_name' => 'web'],
            ]);
        }

        foreach(Permission::all() as $permission){
            $role_user->givePermissionTo($permission);
        }

        User::first()->assignRole('admin'); // assign admin role to the first user
    }
}
