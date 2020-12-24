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
    protected $description = 'Generate a new Service';

    protected $type = 'Service';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/service.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '/Services';
    }
}
