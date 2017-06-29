<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;
use SuperV\Nucleus\Domains\Entry\HasMany;

class ZoneModel extends HostingServiceModel
{
    protected $results;

    public function records()
    {
        return new HasMany($this, RecordModel::class, 'zone');
    }

    public function setRelation($method, $results)
    {
        array_set($this->results, $method, $results);
    }
}