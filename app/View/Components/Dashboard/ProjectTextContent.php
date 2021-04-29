<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class ProjectTextContent extends Component
{
    public array $availableLangs;
    public int $key;

    public function __construct($availableLangs, $key = 0)
    {
        $this->availableLangs = $availableLangs;
        $this->key = $key;
    }

    public function render()
    {
        return view('components.dashboard.project-text-content');
    }
}
