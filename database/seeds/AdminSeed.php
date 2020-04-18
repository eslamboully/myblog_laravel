<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cruds = ['create','read','update','delete'];
        $models = ['admins','categories','blogs'];
        foreach ($models as $model){
            foreach ($cruds as $crud){
                Permission::create(['name' => $crud.'_'.$model,'guard_name' => 'admin']);
            }
        }

        $admin = \App\Admin::create([
            'name' => 'عبدالرحمن اسامة',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'description' => 'hh',
        ]);

        $permissions = Permission::all();

        $admin->givePermissionTo([$permissions]);

    }
}
