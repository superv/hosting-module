<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Modules\Hosting\Model\Entry\PlanEntryModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;

class PlanModel extends PlanEntryModel
{
    public function drops()
    {
        return $this->belongsToMany(
            DropModel::class,
            'hosting_plan_drops',
            'plan_id',
            'drop_id'
        );
    }

    public function getDrops()
    {
        return $this->drops;
    }

    public function getServiceOptions()
    {
        return app('services')->get();
    }
}