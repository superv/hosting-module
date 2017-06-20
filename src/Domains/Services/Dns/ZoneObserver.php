<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceObserver;

class ZoneObserver extends HostingServiceObserver
{
    public function deleted()
    {
        parent::deleted();

//        $this->entry->records->map(function (RecordModel $record) {
//            $record->delete();
//        });
    }
}