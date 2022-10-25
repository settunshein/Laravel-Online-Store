<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * employee model
     */
    protected $employeeModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->employeeModel = new Admin();
    }

    /**
     * To get employee list
     * @return object employee list object
     */
    public function getEmployeeList()
    {
        return $this->employeeModel->getEmployeeList();
    }

    /**
     * To show employee list view
     * @return view employee list view
     */
    public function index()
    {
        return view('admin.employee.index');
    }

    /**
     * To show create employee view
     * @return view create employee view
     */
    public function create()
    {
        $roles = $this->employeeModel->getCreateOrEditEmployeeData();

        return view('admin.employee.form', compact('roles'));
    }

    /**
     * To show employee details info view
     * @return view employee details info view
     */
    public function show(Admin $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * To save employee
     * @param array $request validated values from employee request
     * @param object $employee employee object
     * @return view employee list view
     */
    public function store(EmployeeRequest $request)
    {
        $this->employeeModel->saveEmployee($request);

        return redirect()->route('admin.employee.index')->with('success', 'New Employee Created Successfully');
    }

    /**
     * To show edit employee view
     * @return view edit employee view
     */
    public function edit(Admin $employee)
    {
        $roles = $this->employeeModel->getCreateOrEditEmployeeData();

        return view('admin.employee.form', compact('roles', 'employee'));
    }

    /**
     * To update employee
     * @param array $request validated values from employee request
     * @param request $user employee request
     * @return view employee list view
     */
    public function update(Request $request, Admin $employee)
    {
        $this->employeeModel->updateEmployee($request, $employee);

        return redirect()->route('admin.employee.index')->with('success', 'Employee Updated Successfully');
    }

    /**
     * To delete employee
     * @param object $employee employee object
     * @return
     */
    public function destroy(Admin $employee)
    {
        $this->employeeModel->deleteEmployee($employee);
    }
}
