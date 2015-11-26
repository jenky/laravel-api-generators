<?php

namespace Jenky\LaravelApiGenerators\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends GeneratorCommand
{
    /**
     * @{inheritdoc}
     */
    protected $name = 'make:api:model';

    /**
     * @{inheritdoc}
     */
    protected $description = 'Create a new api model class';

    /**
     * @{inheritdoc}
     */
    protected $type = 'Model';

    /**
     * @{inheritdoc}
     */
    protected function getStub()
    {
        if ($this->option('soft-delete')) {
            return __DIR__ . '/../../stubs/model.soft_delete.stub';
        }

        return __DIR__ . '/../../stubs/model.stub';
    }

    /**
     * @{inheritdoc}
     */
    protected function getOptions()
    {
        return [
            ['soft-delete', null, InputOption::VALUE_NONE, 'Generate model class with soft delete.'],
        ];
    }

}