<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class TraitMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new Trait';

    protected $type = 'Trait';


    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/trait.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '/Traits';
    }
}
