<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class AvailablePositions extends Component
{
    public array $positions;
    public array $avilablePositions;

    public function __construct($positions)
    {
        $this->positions = !empty($positions) ? $positions : [0];
        $this->avilablePositions = [];
    }


    public function render()
    {
        return view('components.dashboard.available-positions');
    }

    public function getAvailablePositions(): array
    {
        $maxAvilablePosition = max($this->positions) + 1;
        $possiblePositions = range(1, $maxAvilablePosition);
        $this->avilablePositions = array_diff($possiblePositions, $this->positions);

        return $this->avilablePositions;
    }
}
