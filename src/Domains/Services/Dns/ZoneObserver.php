<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use Illuminate\Events\Dispatcher;

class ZoneObserver
{
    /**
     * @var ZoneModel
     */
    private $zone;

    public function __construct(ZoneModel $zone)
    {
        $this->events = app(Dispatcher::class);
        $this->zone = $zone;
    }

    public function creating()
    {

    }

    public function created()
    {
        $event = $this->zone->getAgentSlug() . '.' . $this->zone->getModelSlug() . ".created";

        $this->events->dispatch($event, $this->zone);
    }
}