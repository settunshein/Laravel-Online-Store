<?php

namespace App\Models;

use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ButtonBuilder;

    protected $fillable = [ 'name', 'email', 'phone', 'image', 'password', 'address' ];

    protected $hidden   = [ 'password', 'remember_token', ];
    
    protected $casts    = [ 'email_verified_at' => 'datetime', ];

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    /** 
     * To get customer profile image path
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
    public function getUserList()
    {
        return DataTables::of(User::query())
        
        ->editColumn('image', function($employee){
            return '
                <img src="'.$employee->getImagePath().'" class="img-fluid rounded-circle" width="65">
            ';
        })

        ->addColumn('action', function($user){
            return $this->generateButton($user, 'user', ['delete']);
        })

        ->rawColumns(['image', 'action'])
        ->make(true);
    }

    /** 
     * To delete user data
     * @param object user list object
     * @return 
     */
    public function deleteUser($user)
    {
        $user->delete();
    }
}
