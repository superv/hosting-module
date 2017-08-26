<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\BaseServiceObserver;
use SuperV\Platform\Domains\Entry\EntryModel;

class ZoneObserver extends BaseServiceObserver
{
    public function deleting(EntryModel $entry)
    {
        parent::deleting($entry);

        $entry->getRecords()->map(function (RecordModel $record) {
            $record->delete();
        });
    }
}