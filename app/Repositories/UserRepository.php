<?php

namespace App\Repositories;

<<<<<<< HEAD
=======
use App\Models\User;
use Illuminate\Support\Facades\Hash;

>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
class UserRepository implements RepositoryInterface
{

    /**
     * @return mixed
     */
    public function all()
    {
<<<<<<< HEAD
        // TODO: Implement all() method.
=======
        return User::all();
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
    }

    /**
     * @param array $data
<<<<<<< HEAD
=======
     *
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
     * @return mixed
     */
    public function create(array $data)
    {
<<<<<<< HEAD
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
=======
        // run create method
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
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
    }

    /**
     * @param $id
     * @return mixed
     */
<<<<<<< HEAD
    public function delete($id)
    {
        // TODO: Implement delete() method.
=======
    public function show($id)
    {
        return User::findOrFail($id);
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
    }
}
