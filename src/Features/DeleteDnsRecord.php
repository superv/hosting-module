<?php namespace SuperV\Modules\Hosting\Features;

use SuperV\Modules\Hosting\Domains\Services\Dns\Records;
use SuperV\Modules\Hosting\Domains\Services\Dns\Zones;
use SuperV\Platform\Domains\Feature\Feature;

class DeleteDnsRecord extends Feature
{
    public static $route = 'delete@api/hosting/dns/records';

    public function handle(Records $records)
    {
        if (!$record = $records->find($this->record_id)) {
            throw new \Exception('Record not found');
        }

        $record->delete();

        return true;
    }
}