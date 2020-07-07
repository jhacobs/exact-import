<?php

namespace Exact\Jobs;

use Exact\ExactImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;

class QueueImport implements ShouldQueue
{
    use Queueable, InteractsWithQueue, Dispatchable;

    protected $import;

    public function __construct(ExactImport $import)
    {
        $this->import = $import;
    }

    public function handle(): void
    {
        $this->import->run();
    }
}
