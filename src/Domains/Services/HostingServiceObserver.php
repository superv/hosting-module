<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Nucleus\Domains\Entry\Nucleus;
use SuperV\Platform\Contracts\Dispatcher;

abstract class HostingServiceObserver
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

    public function creating() { }

    public function created()
    {
        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".created";

        $this->events->dispatch($event, $this->entry);
    }

    public function saved()
    {

        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $this->entry);
    }

    public function updated()
    {
        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".updated";

        $this->events->dispatch($event, $this->entry);
    }

    public function deleted()
    {

        $event = $this->entry->getAgentSlug() . '.' . $this->entry->getModelSlug() . ".deleted";

        $this->events->dispatch($event, $this->entry);
    }
}