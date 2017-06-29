<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class HostingServiceModel extends EntryModel
{
    public function service()
    {
        return $this->belongsTo(ServiceModel::class, 'service_id');
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