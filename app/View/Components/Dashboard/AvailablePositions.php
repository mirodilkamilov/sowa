<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class AvailablePositions extends Component
{
    public $positions;
    public $arrayOfPositions;

    public function __construct($positions)
    {
        $this->positions = $positions;
        $this->arrayOfPositions = [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
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
                while ($position->position != $counter) {
                    array_push($this->arrayOfPositions, $counter);
                    ++$counter;
                }
                ++$counter;
                ++$i;
            }

            // sets last available position
            if (count($this->positions) == $i || empty($this->arrayOfPositions)) {
                $lastAvailablePosition = $counter;
                array_push($this->arrayOfPositions, $lastAvailablePosition);
            }
        }

        return $this->arrayOfPositions;
    }
}
