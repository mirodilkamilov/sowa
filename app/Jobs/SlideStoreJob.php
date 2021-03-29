<?php

namespace App\Jobs;

use App\Models\Slide;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SlideStoreJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $validated;

    public function __construct($validated)
    {
        $this->validated = $validated;
    }

    public function handle()
    {
        Slide::create($this->validated);
    }
}
