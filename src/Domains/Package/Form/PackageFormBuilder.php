<?php namespace SuperV\Modules\Hosting\Domains\Package\Form;

use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\UI\Form\FormBuilder;

class PackageFormBuilder extends FormBuilder
{
    public function onSaved(EntryModel $entry)
    {
        $mode = $this->getForm()->getMode();
    }
}