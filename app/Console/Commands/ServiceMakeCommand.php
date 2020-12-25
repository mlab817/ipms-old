<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $description = 'Generate a new Service';
=======
    protected $description = 'Generate a new service class';
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9

    protected $type = 'Service';

    /**
     * @return string
     */
<<<<<<< HEAD
    protected function getStub(): string
=======
    protected function getStub()
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
    {
        return __DIR__ . '/stubs/service.stub';
    }

<<<<<<< HEAD
    public function getDefaultNamespace($rootNamespace): string
=======
    protected function getDefaultNamespace($rootNamespace)
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
    {
        return $rootNamespace . '/Services';
    }
}
