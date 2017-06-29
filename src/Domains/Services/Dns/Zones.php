<?php namespace SuperV\Modules\Hosting\Domains\Services\Dns;

use SuperV\Platform\Domains\Model\EloquentRepository;

class Zones extends EloquentRepository
{
    public function findByDomain($domain)
    {
        return $this->model->where('domain', $domain)->first();
    }
}