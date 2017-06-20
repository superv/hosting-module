<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class ZoneModel extends HostingServiceModel
{
    public function records()
    {
        return $this->hasMany(DnsRecordModel::class, 'dns_zone_id');
    }
}