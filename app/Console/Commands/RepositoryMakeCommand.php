<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
<<<<<<< HEAD
    protected $description = 'Generate a new Repository';

    protected $type = 'Repository';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/repository.stub';
    }

    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '/Repositories';
    }
=======
    protected $description = 'Generate a new repository file';

    protected $type = 'Repository';

    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/repository.stub';
    }
>>>>>>> dabc44019c38ca0bba34fa3446a456a17e908fb9
}
