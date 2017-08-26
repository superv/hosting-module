<?php namespace SuperV\Modules\Hosting\Domains\Hosting;


use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;

class HostingModel extends HostingEntryModel
{
    public $timestamps = true;

    public function services()
    {
        return $this->hasMany(HostingServiceModel::class, 'hosting_id');
    }

    public function getServices()
    {
        return $this->services;
    }

    public function getDomain()
    {
        return $this->domain;
    }

}