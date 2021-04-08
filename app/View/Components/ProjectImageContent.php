<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProjectImageContent extends Component
{
    public int $maxNumOfNotEmptyInputs = 1;
    private $oldValues;

    public function __construct()
    {
        $this->oldValues = old('content.1');
        if (isset($this->oldValues))
            $this->maxNumOfNotEmptyInputs = $this->getMaxNumOfNotEmptyInputs();
    }

    private function getMaxNumOfNotEmptyInputs(): int
    {
        $imageTypes = $this->oldValues['image-type'];
        $numOfNotEmptyImageType = 0;
        foreach ($imageTypes as $imageType) {
            if (isset($imageType))
                ++$numOfNotEmptyImageType;
        }

        $positions = $this->oldValues['position'];
        $numOfNotEmptyPosition = 0;
        foreach ($positions as $position) {
            if (isset($position))
                ++$numOfNotEmptyPosition;
        }

        $this->maxNumOfNotEmptyInputs = $numOfNotEmptyImageType > $numOfNotEmptyPosition ? $numOfNotEmptyImageType : $numOfNotEmptyPosition;
        if ($this->maxNumOfNotEmptyInputs == 0)
            $this->maxNumOfNotEmptyInputs = 1;

        return $this->maxNumOfNotEmptyInputs;
    }

    public function render()
    {
        return view('components.project-image-content');
    }
}
