<?php

namespace App\Jobs;

use App\Http\Requests\UpdateSlideRequest;
use App\Models\Category;
use App\Models\Slide;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class UpdateSlideJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $validated;
    private Slide $slide;

    public function __construct(Slide $slide, UpdateSlideRequest $request)
    {
        $this->validated = $request->validated();
        unset($this->validated['image']);

        if ($request->hasFile('image'))
            $this->validated['image'] = $request->file('image')->store('slides');

        $this->validated['id'] = $slide->id;
        $this->slide = $slide;
    }

    public function handle(): void
    {
        $this->validated['category_id'] = $this->validated['category_id'] !== 'all' ? $this->validated['category_id'] : null;

        $this->slide->update($this->validated);
    }
}
