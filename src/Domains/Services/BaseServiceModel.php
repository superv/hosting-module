<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class BaseServiceModel extends EntryModel
{

    public function service()
    {
        return $this->belongsTo(ServiceModel::class, 'service_id');
    }

    public function package()
    {
        return $this->belongsTo(PackageModel::class, 'package_id');
    }

    public function getPackage()
    {
        return $this->package;
    }

    public function getDomain()
    {
        return $this->getPackage()->getDomain();
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