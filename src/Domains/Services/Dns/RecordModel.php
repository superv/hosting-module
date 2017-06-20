<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class RecordModel extends HostingServiceModel
{
    public function service()
    {
        return $this->zone->service;
    }
}