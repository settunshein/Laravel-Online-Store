<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method() == 'PATCH'){
            $email    = 'required|email|unique:admins,email,' . $this->employee->id;
            $phone    = 'required|unique:admins,phone,' . $this->employee->id;
            $nrc      = 'required|unique:admins,nrc,' . $this->employee->id;
            $password = 'nullable';
            $image    = 'required|mimes:png,jpg,jpeg|file';
        }else{
            $email    = 'required|unique:admins,email';
            $phone    = 'required|unique:admins,phone';
            $nrc      = 'required|unique:admins,nrc';
            $password = 'required';
            $image    = 'sometimes|mimes:png,jpg,jpeg|file';
        }

        return [
            'name'     => 'required|string',
            'nrc'      => $nrc,
            'phone'    => $phone,
            'email'    => $email,
            'dob'      => 'required',
            'doj'      => 'required',
            'gender'   => 'required|in:male,female',
            'address'  => 'required',
            'password' => $password,
            'image'    => $image,
            'role'     => 'required',
        ];
    }
}
