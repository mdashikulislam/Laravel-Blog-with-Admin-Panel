<?php

namespace App\Policies;

use App\Model\Admin\Admin;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any admins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,10);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user,11);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function delete( Admin $user)
    {
        return $this->getPermission($user,12);
    }

    /**
     * Determine whether the user can restore the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function restore( Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }

    public function role(Admin $user)
    {
        foreach ($user->roles as $role){
            if ($role->id == 9){
                return true;
            }
        }
        return false;
    }

    public function permission(Admin $user){
        foreach ($user->roles as $role){
            if ($role->id == 9){
                return true;
            }
        }
        return false;
    }
    protected function getPermission($user,$id){
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->id == $id){
                    return true;
                }
            }
        }
        return false;
    }
}
