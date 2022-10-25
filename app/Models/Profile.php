<?php

namespace App\Models;

use App\Traits\UploadTrait;

class Profile
{
    use UploadTrait;

    public function getLoggedInUserData()
    {
        return auth()->guard('admin')->user();
    }

    public function updateProfile($validated)
    {
        
    }
}