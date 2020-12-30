<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ActionMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new action file';

    protected $type = 'Action';

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/action.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '/Actions';
    }
}
