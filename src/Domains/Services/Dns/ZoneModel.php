<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class ZoneModel extends HostingServiceModel
{
    protected $table = 'hosting_dns_zones';

    public function records()
    {
        return $this->hasMany(RecordModel::class, 'id', 'zone_id');
    }

    public function getRecords()
    {
        return $this->records;
    }
}