<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class ProjectTextContent extends Component
{
    public array $availableLangs;
    public int $maxNumOfNotEmptyInputs = 1;
    private $oldTextValues;

    public function __construct($availableLangs)
    {
        $this->availableLangs = $availableLangs;
        $this->oldTextValues = old('content.text');
        if (isset($this->oldTextValues))
            $this->maxNumOfNotEmptyInputs = $this->getMaxNumOfNotEmptyInputs();
    }

    private function getMaxNumOfNotEmptyInputs(): int
    {
        $maxNumOfTitle = 1;
        $maxNumOfDesc = 1;

        $currentNumOfTitle = 0;
        $currentNumOfDesc = 0;
        foreach ($this->oldTextValues as $oldTextValue) {
            foreach ($oldTextValue['title'] as $title) {
                if (isset($title)) {
                    ++$currentNumOfTitle;
                    break;
                }
            }

            foreach ($oldTextValue['description'] as $description) {
                if (isset($description)) {
                    ++$currentNumOfDesc;
                    break;
                }
            }
        }

        if ($currentNumOfTitle > $maxNumOfTitle)
            $maxNumOfTitle = $currentNumOfTitle;

        if ($currentNumOfDesc > $maxNumOfDesc)
            $maxNumOfDesc = $currentNumOfDesc;

        $maxNumOfNotEmptyInputs = $maxNumOfTitle > $maxNumOfDesc ? $maxNumOfTitle : $maxNumOfDesc;
        return $maxNumOfNotEmptyInputs;
    }

    public function render()
    {
        return view('components.dashboard.project-text-content');
    }

}
