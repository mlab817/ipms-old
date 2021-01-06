<?php

namespace Tests;

use App\Models\Project;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
//use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        // install jwt

        $this->seed();
    }
}
