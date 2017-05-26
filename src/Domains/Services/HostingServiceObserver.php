<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\Entry\EntryObserver;

class HostingServiceObserver extends EntryObserver
{
    public function created(EntryModel $entry)
    {
        parent::created($entry);

        $event = $entry->getAgentSlug() . '.' . $entry->getModelSlug() . ".created";

        $this->events->dispatch($event, $entry);
    }

    public function saved(EntryModel $entry)
    {
        parent::saved($entry);

        $event = $entry->getAgentSlug() . '.' . $entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $entry);
    }

    public function updated(EntryModel $entry)
    {
        parent::updated($entry);

        $event = $entry->getAgentSlug() . '.' . $entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $entry);
    }

    public function deleted(EntryModel $entry)
    {
        parent::deleted($entry);

        $event = $entry->getAgentSlug() . '.' . $entry->getModelSlug() . ".deleted";

        $this->events->dispatch($event, $entry);
    }
}