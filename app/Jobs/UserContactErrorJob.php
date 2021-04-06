<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserContactErrorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private \Exception $e;

    public function __construct(\Exception $exception)
    {
        $this->e = $exception;
    }

    public function handle()
    {
        Log::error($this->e->getMessage() . " in {$this->e->getFile()} ({$this->e->getLine()})\r\n" . "{$this->e->getTraceAsString()}");

    }
}
