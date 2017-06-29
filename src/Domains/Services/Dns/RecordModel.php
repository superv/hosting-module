<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class RecordModel extends HostingServiceModel
{
    protected $table = 'hosting_dns_records';

    public function getService()
    {
        return $this->getZone()->getService();
    }

    public function zone()
    {
        return $this->hasOne(ZoneModel::class, 'id', 'zone_id');
    }

    public function getZone()
    {
        return $this->zone;
    }
}