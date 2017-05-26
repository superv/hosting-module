<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class DnsZoneModel extends HostingServiceModel
{
    protected $table = 'hosting_dns_zones';

    public $timestamps = true;

    public function records()
    {
        return $this->hasMany(DnsRecordModel::class, 'dns_zone_id');
    }
}