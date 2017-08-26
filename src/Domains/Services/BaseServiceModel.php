<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Modules\Hosting\Domains\Hosting\HostingModel;
use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class BaseServiceModel extends EntryModel
{

    public function service()
    {
        return $this->belongsTo(ServiceModel::class, 'service_id');
    }

    public function hosting()
    {
        return $this->belongsTo(HostingModel::class, 'hosting_id');
    }

    /** @return HostingModel */
    public function getHosting()
    {
        return $this->hosting;
    }

    public function getDomain()
    {
        return $this->getHosting()->getDomain();
    }

    /** @return ServiceModel */
    public function getService()
    {
        return $this->service;
    }

    public function getAgentSlug()
    {
        return $this->getService()->getAgent()->slug();
    }

    public function getModelSlug()
    {
        return snake_case(substr(class_basename($this), 0, -5));
    }

    public function getServer()
    {
        return $this->getService()->getServer();
    }
}