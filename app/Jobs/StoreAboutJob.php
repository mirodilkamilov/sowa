<?php

namespace App\Jobs;

use App\Http\Requests\StoreAboutRequest;
use App\Models\About;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreAboutJob
{
    use Dispatchable;

    private StoreAboutRequest $request;
    private array $validated;

    public function __construct(StoreAboutRequest $request)
    {
        $this->request = $request;
        $this->validated = $request->validated();
    }

    public function handle(): void
    {
        $mainPart = &$this->validated['main'][1];
        if ($this->request->hasFile('main.1.image'))
            $mainPart['image'] = $this->request->file('main.1.image')->store('about');

        $about = About::create($mainPart);

        $lists = $this->validated['list'];
        foreach ($lists as $list) {
            $about->aboutLists()->create($list);
        }
    }
}
