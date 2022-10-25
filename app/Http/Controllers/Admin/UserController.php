<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{   
    /**
     * user model
     */
    protected $userModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * To get user list
     * @return object user list object
     */
    public function getUserList()
    {
        //abort_if( !auth()->user()->can('Access Employees'), 403, 'ACCESS DENIED');

        return $this->userModel->getUserList();
    }

    /**
     * To show user list view
     * @return view user list view
     */
    public function index()
    {
        //abort_if( !auth()->user()->can('Access Employees'), 403, 'ACCESS DENIED' );

        return view('admin.user.index');
    }

    /**
     * To show user details view
     * @param object $user user object
     * @return view user list view
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * To delete user
     * @param object $user user object
     * @return
     */
    public function destory(User $user)
    {
        //abort_if( !auth()->user()->can('Delete Employees'), 403, 'ACCESS DENIED' );

        $this->userModel->deleteUser($user);
    }
}
