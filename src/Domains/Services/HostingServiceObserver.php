<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Nucleus\Domains\Entry\Nucleus;
use SuperV\Nucleus\Domains\Entry\Observer;
use SuperV\Platform\Contracts\Dispatcher;

abstract class HostingServiceObserver extends Observer
{
    /** @var Dispatcher */
    protected $events;

    /**
     * @var HostingServiceModel
     */
    protected $entry;

    public function __construct(Nucleus $entry)
    {
        $this->entry = $entry;
        $this->events = app(Dispatcher::class);
    }

    public function created()
    {
        parent::created();

        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".created";

        $this->events->dispatch($event, $this->entry);
    }

    public function saved()
    {
        parent::saved();
        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $this->entry);
    }

    public function updated()
    {
        parent::updated();
        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $this->entry);
    }

    public function deleted()
    {
        parent::deleted();
        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".deleted";

        $this->events->dispatch($event, $this->entry);
    }
}