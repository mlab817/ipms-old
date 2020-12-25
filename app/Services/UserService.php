<?php

namespace App\Services;

<<<<<<< HEAD
class UserService
{

=======
use App\Repositories\UserRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function find($id)
    {
        return $this->userRepository->show($id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
}
