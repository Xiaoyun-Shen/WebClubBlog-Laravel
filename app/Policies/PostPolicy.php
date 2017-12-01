<?php
namespace App\Policies;
use App\Model\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the admin can create posts.
     *
     * @param  \App\Admin $user
     * @return mixed
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user,8 );
    }

    /**
     * Determine whether the admin can update the post.
     *
     * @param  \App\Admin $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user, 9);
    }

    /**
     * Determine whether the admin can delete the post.
     *
     * @param  \App\Admin $user
     * @param  \App\Post $post
     * @return mixed
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user,10);
    }

    public function tag(Admin $user)
    {
        return $this->getPermission($user, 16);
    }

    public function category(Admin $user)
    {
        return $this->getPermission($user,15);
    }

    public function user(Admin $user)
    {
        return $this->getPermission($user,12);
    }

    public function publish(Admin $user)
    {
        return $this->getPermission($user,11);
    }

    protected function getPermission($user, $p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}

 ?>