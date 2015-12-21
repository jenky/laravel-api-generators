<?php

namespace Jenky\LaravelApiGenerators\Commands;

use Jenky\LaravelApiGenerators\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RequestMakeCommand extends GeneratorCommand
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'make:api:request';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Create a new api request class';

    /**
     * {@inheritdoc}
     */
    protected $type = 'Request';

    /**
     * {@inheritdoc}
     */
    protected function getStub()
    {
        if ($this->option('resource')) {
            return __DIR__.'/../../stubs/request.resource.stub';
        }

        return __DIR__.'/../../stubs/request.stub';
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Requests';
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions()
    {
        return [
            ['resource', null, InputOption::VALUE_OPTIONAL, 'Generate request class with resource name.'],
        ];
    }
}
