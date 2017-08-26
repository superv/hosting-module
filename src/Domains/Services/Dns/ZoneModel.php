<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\BaseServiceModel;

class ZoneModel extends BaseServiceModel
{
    protected $table = 'hosting_dns_zones';

    public function records()
    {
        return $this->hasMany(RecordModel::class, 'zone_id');
    }

    public function getRecords()
    {
        return $this->records;
    }
}