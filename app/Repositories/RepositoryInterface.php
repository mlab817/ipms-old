<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function create(array $data);

<<<<<<< HEAD
    public function show($id);

    public function update(array $data, $id);

    public function delete($id);
=======
    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
}
