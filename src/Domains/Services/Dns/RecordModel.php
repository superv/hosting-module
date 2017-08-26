<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\BaseServiceModel;

class RecordModel extends BaseServiceModel
{
    protected $table = 'hosting_dns_records';

    public function getHosting()
    {
        return $this->getZone()->getHosting();
    }

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