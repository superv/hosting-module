<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use Illuminate\Events\Dispatcher;
use SuperV\Nucleus\Domains\Entry\Entry;
use SuperV\Platform\Domains\Entry\EntryModel;

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
// superv.agents.power_dns.zone.created
        $this->events->dispatch($event, $this->zone);
    }
}