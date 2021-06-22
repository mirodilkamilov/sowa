<?php

namespace App\View\Components\Dashboard;

use App\Models\ProjectContent;
use Illuminate\View\Component;

class ProjectTextContent extends Component
{
    public array $availableLangs;
    public int $key;
    public ?ProjectContent $content;

    public function __construct($availableLangs, $key = 0, $content = null)
    {
        $this->availableLangs = $availableLangs;
        $this->key = $key;
        $this->content = $content;
    }

    public function render()
    {
        return view('components.dashboard.project-text-content');
    }
}
