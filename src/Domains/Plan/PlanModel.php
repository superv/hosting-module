<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Modules\Hosting\Model\Entry\PlanEntryModel;
use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;

class PlanModel extends PlanEntryModel
{
    public function services()
    {
        return $this->belongsToMany(
            ServiceModel::class,
            'hosting_plan_services',
            'plan_id',
            'service_id'
        );
    }

    public function getServices()
    {
        return $this->services;
    }
}