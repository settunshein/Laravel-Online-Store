<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * role model
     */
    protected $roleModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->roleModel = new Role();
    }

    /**
     * To get role list
     * @return object role list object
     */
    public function getRoleList()
    {
        return $this->roleModel->getRoleList();
    }

    /**
     * To show role list view
     * @return view role list view
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * To show create role view
     * @return view create role view
     */
    public function create()
    {
        $dataList = $this->roleModel->getCreateOrEditRoleData();

        return view('admin.role.form', compact('dataList'));
    }

    /**
     * To save role
     * @param array $request validated values from role request
     * @return view role list view
     */
    public function store(RoleRequest $request)
    {
        $this->roleModel->saveRole($request);

        return redirect()->route('admin.role.index')->with('success', 'New Role Created Successfully');
    }

    /**
     * To show edit role view
     * @param object $role role object
     * @return view edit role view
     */
    public function edit(Role $role)
    {
        $dataList = $this->roleModel->getCreateOrEditRoleData();

        return view('admin.role.form', compact('dataList', 'role'));
    }

    /**
     * To update role
     * @param array $request validated values from role request
     * @param object $role role object
     * @return view role list view
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->roleModel->updateRole($request, $role);

        return redirect()->route('admin.role.index')->with('success', 'Role Updated Successfully');
    }

    /**
     * To delete role
     * @param object $role role object
     * @return
     */
    public function destroy(Role $role)
    {
        $this->roleModel->deleteRole($role);
    }
}
