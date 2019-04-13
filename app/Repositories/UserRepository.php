<?php

namespace App\Repositories;

class UserRepository extends Repository
{
   
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return 'App\User';
    }

    /**
     * Paginate table user.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function userWithPaginate()
    {
        return $this->model->with('role')
            ->paginate(10);
    }

    /**
     * Users role
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function userWithRole()
    {
        return $this->model->with('role')->get();
    }

    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function attachRole($user)
    {
        if ($user->is_activated == '1') {
            if ($user->hasRole('admin')) {
                return redirect()->to('/welcome');
            }
            //Demo user role
            $role = $this->find($user->id);
            $role->role()->sync(array($user->id => 2)); //2 for Demo users
            //End add Demo User
        }
    }
}