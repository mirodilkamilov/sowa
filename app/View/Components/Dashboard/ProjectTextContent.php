<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class ProjectTextContent extends Component
{
    public array $availableLangs;

    public function __construct($availableLangs)
    {
        $this->availableLangs = $availableLangs;
    }

    public function render()
    {
        return view('components.dashboard.project-text-content');
    }
}
