<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Nucleus\Domains\Entry\Nucleus;

abstract class HostingServiceModel extends Nucleus
{
    public function getAgentSlug()
    {
        return $this->getService()->agent->slug;
    }

    public function getModelSlug()
    {
        return snake_case(substr(class_basename($this), 0, -5));
    }

    public function getServer()
    {
        return $this->service->server;
    }

    /** @return ServiceModel */
    public function getService()
    {
        return $this->service;
    }

}