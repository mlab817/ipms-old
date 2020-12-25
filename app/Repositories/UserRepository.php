<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements RepositoryInterface
{

    /**
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        // run events

        // return response
        return $user->fresh();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $user = User::findOrFail($id);

        $user->update($data);

        return $user;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }
}
