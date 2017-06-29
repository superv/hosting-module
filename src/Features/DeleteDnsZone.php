<?php namespace SuperV\Modules\Hosting\Features;

use SuperV\Modules\Hosting\Domains\Services\Dns\Zones;
use SuperV\Platform\Domains\Feature\Feature;

class DeleteDnsZone extends Feature
{
    public static $route = 'delete@api/hosting/dns/zones';

    public function handle(Zones $zones)
    {
        if (!$zone = $zones->findByDomain($this->domain)) {
            throw new \Exception('Zone not found');
        }

        $zone->delete();

        return true;
    }
}