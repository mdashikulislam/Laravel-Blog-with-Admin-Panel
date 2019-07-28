<?php

namespace App\Policies;

use App\Model\Admin\Admin;
use App\Model\User\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(Admin $user)
    {

    }

    /**
     * Determine whether the user can view the post.
     *
     * @param Admin $user
     * @param post $post
     * @return mixed
     */
    public function view(Admin $user, post $post)
    {

    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->policyPermission($user,7);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param Admin $user
     * @param post $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->policyPermission($user,8);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param Admin $user
     * @param post $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->policyPermission($user,9);
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param Admin $user
     * @param post $post
     * @return mixed
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param Admin $user
     * @param post $post
     * @return mixed
     */
    public function forceDelete(Admin $user)
    {
        //
    }

    public function tag(Admin $admin)
    {
       return $this->policyPermission($admin,14);
    }

    public function category(Admin $admin)
    {
       return $this->policyPermission($admin,15);
    }

    protected function policyPermission($user,$id){
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
