<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class AvailablePositions extends Component
{
    public $positions;
    public array $arrayOfPositions;

    public function __construct($positions)
    {
        $this->positions = $positions;
        $this->arrayOfPositions = [];
    }


    public function render()
    {
        return view('components.dashboard.available-positions');
    }

    public function getAvailablePositions(): array
    {
        $counter = 1;
        $i = 0;

        if (isset($this->positions)) {
            foreach ($this->positions as $position) {
                while ($position !== $counter) {
                    $this->arrayOfPositions[] = $counter;
                    ++$counter;
                }
                ++$counter;
                ++$i;
            }

            // sets last available position
            if (empty($this->arrayOfPositions) || count($this->positions) === $i) {
                $lastAvailablePosition = $counter;
                $this->arrayOfPositions[] = $lastAvailablePosition;
            }
        }

        return $this->arrayOfPositions;
    }
}
