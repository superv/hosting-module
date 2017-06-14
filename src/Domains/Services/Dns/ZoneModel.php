<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Nucleus\Domains\Entry\Nucleus;

class ZoneModel extends Nucleus
{

    public function getAgentSlug()
    {
        return $this->service->agent->slug;
    }

    public function getModelSlug()
    {
        return snake_case(substr(class_basename($this), 0, -5));
    }

    public function getServer()
    {
        return $this->service->server;
    }
}