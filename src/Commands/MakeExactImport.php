<?php

namespace Exact\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeExactImport extends Command
{
    protected $signature = 'make:exact-import {name} {--path=}';

    protected $description = 'Make a exact import';

    protected $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;

        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->option('path');

        $stub = $this->getStub();

        $this->files->put(
            $path = $this->getPath($name, $path),
            $this->populateStub($name, $stub)
        );

        return $path;
    }

    protected function getStub(): string
    {
         return $this->files->get(__DIR__.'../../stubs/exact.import.stub');
    }

    protected function getPath($name, $path): string
    {
        return $path.'/'.date('Y_m_d_His').'_'.$name.'.php';
    }

    protected function populateStub($name, $stub)
    {
        $stub = str_replace(
            ['{{ class }}', '{{class}}'],
            Str::studly($name),
            $stub
        );

        return $stub;
    }
}
