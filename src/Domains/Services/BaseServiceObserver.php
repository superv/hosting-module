<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\Entry\EntryObserver;

class BaseServiceObserver extends EntryObserver
{
    protected function dispatch(EntryModel $entry, $eventName)
    {
        $event = $entry->getAgentSlug() . '::' . $entry->getModelSlug() . ".{$eventName}";

        $this->events->dispatch($event, $entry);
    }

    public function created(EntryModel $entry)
    {
        parent::created($entry);

        $this->dispatch($entry, "created");
    }

    public function saved(EntryModel $entry)
    {
        parent::saved($entry);

        $this->dispatch($entry, "updated");
    }

    public function updated(EntryModel $entry)
    {
        parent::updated($entry);

        $this->dispatch($entry, "updated");
    }

    public function deleted(EntryModel $entry)
    {
        parent::deleted($entry);

        $this->dispatch($entry, "deleted");
    }
}