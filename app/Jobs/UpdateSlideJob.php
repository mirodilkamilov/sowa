<?php

namespace App\Jobs;

use App\Models\Slide;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateSlideJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $validated;
    private Slide $slide;

    public function __construct($slide, $validated)
    {
        $this->validated = $validated;
        $this->slide = $slide;
    }

    public function handle()
    {
        if (!isset($this->validated['image']))
            unset($this->validated['image']);

        $this->slide->update($this->validated);
    }
}
