<?php

namespace App\Jobs;

use App\Http\Requests\StoreSlideRequest;
use App\Models\Slide;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreSlideJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $validated;

    public function __construct(StoreSlideRequest $request)
    {
        $this->validated = $request->validated();
        $this->validated['image'] = $request->file('image')->store('slides');
    }

    public function handle()
    {
        Slide::create($this->validated);
    }
}
