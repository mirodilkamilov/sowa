<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class LanguageTabs extends Component
{
    public array $availableLangs;
    public bool $hasMultiValuedInput;
    private mixed $oldTextValues;
    private $errorMessages;

    public function __construct($availableLangs, $errorMessages = null, $hasMultiValuedInput = false)
    {
        $this->availableLangs = $availableLangs;
        $this->oldTextValues = old('content.text') ?? null;
        $this->errorMessages = $errorMessages;
        $this->hasMultiValuedInput = $hasMultiValuedInput;
    }

    public function render()
    {
        if (isset($this->errorMessages, $this->oldTextValues))
            $this->unsetUnnecessaryElements();
        return view('components.dashboard.language-tabs');
    }

    private function unsetUnnecessaryElements()
    {
        $oldTextValueIndex = 0;
        foreach ($this->oldTextValues as $oldTextValue) {
            $hasNullValue = true;
            ++$oldTextValueIndex;

            foreach ($oldTextValue['title'] as $title) {
                if (isset($title)) {
                    $hasNullValue = false;
                    break;
                }
            }
            if ($hasNullValue) {
                unset($oldTextValue['title']);
//                unset($this->errorMessages->get("content.text.$oldTextValueIndex.*"));
            }

//            foreach ($oldTextValue['description'] as $description) {
//                if (isset($description)) {
//                    ++$currentNumOfDesc;
//                    break;
//                }
//            }
        }
    }
}
