<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceObserver;
use SuperV\Platform\Domains\Entry\EntryModel;

class ZoneObserver extends HostingServiceObserver
{
    public function deleting(EntryModel $entry)
    {
        parent::deleting($entry);

        $entry->getRecords()->map(function (RecordModel $record) {
            $record->delete();
        });
    }
}