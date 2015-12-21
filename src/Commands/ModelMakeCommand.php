<?php

namespace Jenky\LaravelApiGenerators\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseModelMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends BaseModelMakeCommand
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'make:model:fill';

    /**
     * {@inheritdoc}
     */
    protected function getStub()
    {
        if ($this->option('soft-delete')) {
            return __DIR__.'/../../stubs/model.soft_delete.stub';
        }

        return __DIR__.'/../../stubs/model.stub';
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions()
    {
        $parent = parent::getOptions();

        $parent[] = ['soft-delete', 's', InputOption::VALUE_NONE, 'Generate model class with soft delete.'];

        return $parent;
    }
}
