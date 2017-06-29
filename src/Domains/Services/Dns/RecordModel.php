<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class RecordModel extends HostingServiceModel
{
    public function getService()
    {
        return $this->zone->service;
    }
}