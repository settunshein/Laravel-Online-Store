<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;

class ProfileController extends Controller
{   
    /**
     * profile model
     */
    protected $profileModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->profileModel = new Profile();
    }

    /**
     * To show profile page
     * @return view profile page
     */
    public function showProfilePage()
    {
        $authUser = $this->profileModel->getLoggedInUserData();

        return view('admin.profile.index', compact('authUser'));
    }

    /**
     * To show profile edit page
     * @return view profile page
     */
    public function showEditProfilePage()
    {
        $authUser = $this->profileModel->getLoggedInUserData();

        return view('admin.profile.form', compact('authUser'));
    }

    /**
     * To submit profile edit page
     * @return
     */
    public function submitEditProfilePage(EmployeeProfileRequest $request)
    {
        $this->profileModel->updateProfile($request);
    }
}
