<?php

namespace SuperV\Modules\Hosting\Domains\Services\Web\Model;

use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\Entry\EntryObserver;

class WebServiceObserver extends EntryObserver
{
    public function created(EntryModel $entry)
    {
        $event =  'superv::web.created';

        $this->events->dispatch($event,$entry);

        parent::created($entry);
    }
}