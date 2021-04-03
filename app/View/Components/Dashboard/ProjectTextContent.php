<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class ProjectTextContent extends Component
{
    public array $availableLangs;
    public int $maxNumOfNotEmptyInputs = 1;
    private $oldValues;

    public function __construct($availableLangs)
    {
        $this->availableLangs = $availableLangs;
        $this->oldValues = old('content.0');
        if (isset($this->oldValues))
            $this->maxNumOfNotEmptyInputs = $this->getMaxNumOfNotEmptyInputs();
    }

    private function getMaxNumOfNotEmptyInputs(): int
    {
        $maxNumOfTitle = 0;
        $titleByLangs = $this->oldValues['title'];
        foreach ($titleByLangs as $titleByLang) {
            $currentNumOfTitle = 0;
            foreach ($titleByLang as $title) {
                if (isset($title))
                    ++$currentNumOfTitle;
            }
            if ($currentNumOfTitle > $maxNumOfTitle)
                $maxNumOfTitle = $currentNumOfTitle;
        }

        $maxNumOfDesc = 0;
        $descByLangs = $this->oldValues['description'];
        foreach ($descByLangs as $descByLang) {
            $currentNumOfDesc = 0;
            foreach ($descByLang as $description) {
                if (isset($description))
                    ++$currentNumOfDesc;
            }
            if ($currentNumOfDesc > $maxNumOfDesc)
                $maxNumOfDesc = $currentNumOfDesc;
        }

        $maxNumOfNotEmptyInputs = $maxNumOfTitle > $maxNumOfDesc ? $maxNumOfTitle : $maxNumOfDesc;
        // * It should have at least one collection of inputs
        if ($maxNumOfNotEmptyInputs == 0)
            $maxNumOfNotEmptyInputs = 1;
        return $maxNumOfNotEmptyInputs;
    }

    public function render()
    {
        return view('components.dashboard.project-text-content');
    }

}
