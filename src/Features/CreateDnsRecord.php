<?php namespace SuperV\Modules\Hosting\Features;

use SuperV\Modules\Hosting\Domains\Services\Dns\Records;
use SuperV\Platform\Domains\Feature\Feature;

class CreateDnsRecord extends Feature
{
    public static $route = 'post@api/hosting/dns/records';

    public function handle(Records $records)
    {
        $record = $records->create(
            [
                'zone_id' => $this->zone_id,
                'name'    => $this->name,
                'type'    => $this->type,
                'content' => $this->content,
            ]
        );

        return ['id' => $record->id];
    }
}