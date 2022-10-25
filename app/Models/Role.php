<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use ButtonBuilder;

    public function getNameAttribute()
    {
        return ucwords(strtolower($this->attributes['name']));
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    /** 
     * To get role list
     * @return object role list object
     */
    public function getRoleList()
    {
        return DataTables::of(Role::query())

        ->addColumn('permissions', function($role){
            if( count($role->permissions) > 0 ){
                return '<span class="badge badge-success rounded-0 permission-badge"> '.count($role->permissions).' Permssions</span>';
            }else{
                return '<span class="badge badge-danger rounded-0 permission-badge">Empty Permission</span>';
            }
        })

        ->addColumn('action', function($role){
            return $this->generateButton($role, 'role', ['edit', 'delete']);
        })

        ->rawColumns(['permissions', 'action'])
        ->make(true);
    }

    /** 
     * To save role data
     * @param array $validated validated values from role request
     * @return
     */
    public function saveRole($validated)
    {
        $role = new Role();
        $role->name = $validated['name'];
        $role->save();

        $role->syncPermissions($validated['permissions']);
    }

    /** 
     * To update role data
     * @param array $validated validated values from role request
     * @param object $role role object
     * @return
     */
    public function updateRole($validated, $role)
    {
        $role->name = $validated['name'];
        $role->save();

        $role->syncPermissions($validated['permissions']);
    }

    /** 
     * To delete role data
     * @param object $role role object
     * @return
     */
    public function deleteRole($role)
    {
        $role->delete();
    }

    /** 
     * To get module list with permissions
     * @param object module list object with permissions
     * @return
     */
    public function getCreateOrEditRoleData()
    {
        $dataList = [];

        $modules = Permission::select('module as module_name')->groupBy('module')->get();
        foreach($modules as $key => $module){
            $dataList[]['module'] = $module->module_name;

            $permissions = Permission::select('id', 'name')->where('module', $module->module_name)->get();
            foreach($permissions as $permission){
                $dataList[$key]['permissions'][] = [
                    'id'   => $permission->id,
                    'name' => $permission->name
                ];
            }
        }
        
        return $dataList;
    }
}