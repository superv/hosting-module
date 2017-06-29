<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceObserver;

class ZoneObserver extends HostingServiceObserver
{
    public function deleting()
    {
        parent::deleting();

        $this->entry->records->map(function (RecordModel $record) {
            $record->delete();
        });
    }
}