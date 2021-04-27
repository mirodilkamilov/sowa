<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OldContents extends Component
{
    public ?array $oldValues;
    public array $availableLangs;

    public function __construct($oldValues, $availableLangs)
    {
        $this->oldValues = $oldValues['content'] ?? null;
        $this->availableLangs = $availableLangs;
    }

    public function render()
    {
        return view('components.old-contents');
    }
}
