<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceObserver;
use SuperV\Platform\Domains\Entry\EntryModel;

class DnsZoneObserver extends HostingServiceObserver
{
    public function deleted(EntryModel $entry)
    {
        parent::deleted($entry);

        $entry->records->map(function (DnsRecordModel $record) {
            $record->delete();
        });
    }
}