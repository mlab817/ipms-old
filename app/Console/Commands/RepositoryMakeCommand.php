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
}
