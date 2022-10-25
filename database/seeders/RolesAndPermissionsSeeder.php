<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole    = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $managerRole  = Role::create(['guard_name' => 'admin', 'name' => 'manager']);
        $employeeRole = Role::create(['guard_name' => 'admin', 'name' => 'employee']);

        $accessControlList = [
            // Role Module
            [
                'module' => 'Role Module',
                'permissions' => [
                    'Access Roles',
                    'Create Role',
                    'Edit Role',
                    'Delete Role'
                ]
            ],

            // Customer Module
            [
                'module' => 'Customer Module',
                'permissions' => [
                    'Access Customers',
                    'Create Customer',
                    'Edit Customer',
                    'Delete Customer'
                ]
            ],

            // Employee Module
            [
                'module' => 'Employee Module',
                'permissions' => [
                    'Access Employees',
                    'Create Employee',
                    'Edit Employee',
                    'Delete Employee'
                ]
            ],

            // Category Module
            [
                'module' => 'Category Module',
                'permissions' => [
                    'Access Categories',
                    'Create Category',
                    'Edit Category',
                    'Delete Category'
                ]
            ],

            // Product Module
            [
                'module' => 'Product Module',
                'permissions' => [
                    'Access Products',
                    'Create Product',
                    'Edit Product',
                    'Delete Product'
                ]
            ],

            // Order Module
            [
                'module' => 'Order Module',
                'permissions' => [
                    'Access Orders',
                    'Edit Order',
                    'Delete Order'
                ]
            ],

            // Order Module
            [
                'module' => 'Profile Module',
                'permissions' => [
                    'Access Profile',
                    'Edit Profile',
                    'Edit Password'
                ]
            ]
        ];// End of Access Control List Array

        for( $i=0; $i<count($accessControlList); $i++){
            $module = $accessControlList[$i]['module'];

            for($j=0; $j<count($accessControlList[$i]['permissions']); $j++){
                $permission = Permission::create([
                    'guard_name' => 'admin',
                    'name'       => $accessControlList[$i]['permissions'][$j],
                    'module'     => $module,
                ]);
                
                $adminRole->givePermissionTo($permission);
                $permission->assignRole($adminRole);
            }
        }

        $adminUser = Admin::where('name', 'Mg Mg')->first();
        $adminUser->syncRoles( Role::where('name', 'admin')->pluck('name')->first() );
    }
}
