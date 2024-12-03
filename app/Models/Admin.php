<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'admin';
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'mobile', 'gender', 'status',
        'role_id', 'last_login_at', 'last_login_ip', 'remember_token'
    ];
    protected $hidden = ['created_at', 'updated_at', 'remember_token'];
    /////////////////////////////////////////////////////////////////////
    /// role
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    //////////////////////////////////// accessors ///////////////////////
    /// Gender accessors
    public function getGenderAttribute($value)
    {
        if ($value == 'male') {
            return __('general.male');
        } elseif ($value == 'female') {
            return __('general.female');
        }
    }


    public function hasAbility($permissions){
        $role = $this->role;
        if(!$role){
            return false;
        }
        foreach($role->permissions as $permission){
            if(is_array($permissions) && in_array($permission, $permissions)){
                return true;
            }else if (is_string($permissions) && strcmp($permissions ,$permission)==0){
                return true;
            }
        }
        return false;
    }

}
