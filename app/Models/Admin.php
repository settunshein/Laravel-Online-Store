<?php

namespace App\Models;

use App\Traits\UploadTrait;
use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles, UploadTrait, ButtonBuilder;

    protected $guraded = [ 'name', 'email', 'phone', 'image', 'password', 'address', 'nrc', 'dob', 'doj', 'gender' ];

    protected $hidden  = [ 'password', ];
    
    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    /** 
     * To get employee profile image path
     * @return
     */
    public function getImagePath()
    {
        if( $this->image ){
            return asset('user/'.$this->image);
        }else{
            return "
                https://ui-avatars.com/api/?background=006699&color=fff&name=$this->name
            ";
        }
    }
    
    /** 
     * To get user list
     * @return object user list object
     */
    public function getEmployeeList()
    {
        return DataTables::of(Admin::query())

        ->editColumn('image', function($employee){
            return '
                <img src="'.$employee->getImagePath().'" class="img-fluid rounded-circle" width="65">
            ';
        })

        ->addColumn('role_name', function($employee){
            if($employee->hasAnyRole([Role::all()])){
                $employee_role = strtoupper($employee->getRoleNames()->first());
                return "<span class='badge badge-primary py-2 px-3 rounded-0 custom-fs-11'>{$employee_role}</span>";
            }else{
                return '<span class="badge badge-danger py-2 px-3 rounded-0 custom-fs-11">NO ROLE</span>';
            }
        })

        ->addColumn('action', function($employee){
            return $this->generateButton($employee, 'employee', ['show', 'edit', 'delete']);
        })

        ->rawColumns(['image', 'role_name', 'action'])
        ->make(true);
    }

    /** 
     * To save user data
     * @param array $validated validated values from employee request
     * @return
     */
    public function saveEmployee($validated)
    {
        $employee = new Admin();
        $employee->name     = $validated['name'];
        $employee->email    = $validated['email'];
        $employee->nrc      = $validated['nrc'];
        $employee->phone    = $validated['phone'];
        $employee->dob      = $validated['dob'];
        $employee->doj      = $validated['doj'];
        $employee->gender   = $validated['gender'];
        $employee->address  = $validated['address'];
        $employee->password = Hash::make($validated['password']);
        $employee->save();

        $employee->assignRole($validated['role']);
    }

    /** 
     * To update employee data
     * @param array $validated validated values from employee request
     * @param object employee list object
     * @return 
     */
    public function updateEmployee($validated, $employee)
    {
        $employee->name     = $validated['name'];
        $employee->email    = $validated['email'];
        $employee->nrc      = $validated['nrc'];
        $employee->phone    = $validated['phone'];
        $employee->dob      = $validated['dob'];
        $employee->doj      = $validated['doj'];
        $employee->gender   = $validated['gender'];
        $employee->address  = $validated['address'];
        $employee->password = $validated['password'] ? Hash::make($validated['password']) : $employee->password;
        $employee->save();

        $employee->syncRoles($validated['role']);
    }

    /** 
     * To delete employee data
     * @param object employee list object
     * @return 
     */
    public function deleteEmployee($employee)
    {
        $employee->delete();
    }

    /** 
     * To get role list
     * @param object role list object
     * @return
     */
    public function getCreateOrEditEmployeeData()
    {
        return Role::all();
    }

    /** 
     * To get employee role
     * @return 
     */
    public function getEmployeeRole()
    {
        return $this->hasAnyRole( [Role::all()] ) ? $this->getRoleNames()->first() : 'No Role';
    }
}
