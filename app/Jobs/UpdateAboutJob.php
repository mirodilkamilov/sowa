<?php

namespace App\Jobs;

use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use App\Models\AboutList;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateAboutJob
{
    use Dispatchable;

    private About $about;
    private UpdateAboutRequest $request;
    private array $validated;

    public function __construct(About $about, UpdateAboutRequest $request)
    {
        $this->about = $about;
        $this->request = $request;
        $this->validated = $request->validated();
    }

    public function handle(): void
    {
        $mainPart = &$this->validated['main'][1];
        if ($this->request->hasFile('main.1.image'))
            $mainPart['image'] = $this->request->file('main.1.image')->store('about');

        $this->about->update($mainPart);

        $lists = $this->validated['list'];
        foreach ($lists as $list) {
            AboutList::where('id', $list['id'])->update($list);
        }
    }
}
