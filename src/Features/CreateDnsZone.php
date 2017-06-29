<?php namespace SuperV\Modules\Hosting\Features;

use SuperV\Modules\Hosting\Domains\Services\Dns\Zones;
use SuperV\Platform\Domains\Feature\Feature;

class CreateDnsZone extends Feature
{
    public static $route = 'post@api/hosting/dns/zones';

    public function handle(Zones $zones)
    {
        $zone = $zones->create(
            [
                'zone_type'   => 'master',
                'domain'      => $this->domain,
                'service_id'     => $this->service_id,
                'external_id' => 0,
            ]
        );

        return ['id' => $zone->id];
    }
}