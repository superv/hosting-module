<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class DnsRecordModel extends HostingServiceModel
{
    protected $table = 'hosting_dns_records';

    public function zone()
    {
        return $this->belongsTo(DnsZoneModel::class, 'dns_zone_id');
    }

    /** @return DnsZoneModel */
    public function getZone()
    {
        return $this->zone;
    }

    public function service()
    {
        return $this->zone->service();
    }
}