<?php

namespace Exact\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeExactImport extends GeneratorCommand
{
    protected $signature = 'make:exact-import {name} {--path=}';

    protected $description = 'Make a exact import';

    protected function alreadyExists($rawName): bool
    {
        return class_exists($rawName) ||
            $this->files->exists($this->getPath($this->qualifyClass($rawName)));
    }

    protected function getStub(): string
    {
        return __DIR__.'/../../stubs/exact.import.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Exact';
    }
}
