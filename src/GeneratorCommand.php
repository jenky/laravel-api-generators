<?php

namespace Jenky\LaravelApiGenerators;

use Illuminate\Console\GeneratorCommand as Generator;
use Illuminate\Support\Str;

class GeneratorCommand extends Generator
{
    /**
     * {@inheritdoc}
     */
    protected function getStub()
    {
    }

    protected function getResourceName()
    {
        return strtolower(Str::singular($this->option('resource')));
    }

    protected function getModelName($name)
    {
        $rootNamespace = $this->laravel->getNamespace();

        $modelNameWithDirectory = $rootNamespace.'Models\\'.ucfirst($this->getResourceName());
        $modelName = $rootNamespace.ucfirst($this->getResourceName());

        return class_exists($modelNameWithDirectory) ? $modelNameWithDirectory : $modelName;
    }

    /**
     * {@inheritdoc}
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $parent = parent::replaceNamespace($stub, $name);

        $stub = str_replace(
            'DummyModelClass', $this->getModelName($name), $stub
        );

        $resourceName = $this->getResourceName();

        $stub = str_replace(
            'DummyResourceClass', ucfirst($resourceName), $stub
        );

        $stub = str_replace(
            'DummyResourceNamePlural', Str::plural($resourceName), $stub
        );

        $stub = str_replace(
            'DummyResourceName', $resourceName, $stub
        );

        return $parent;
    }
}
