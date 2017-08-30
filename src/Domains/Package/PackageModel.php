<?php namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Hosting\Model\Entry\PackageEntryModel;
use SuperV\Modules\Supreme\Domains\Service\Model\DropModel;

class PackageModel extends PackageEntryModel
{
    public function plan()
    {
        return $this->hasOne(PlanModel::class, 'id', 'plan_id');
    }

    /** @return PlanModel */
    public function getPlan()
    {
        return $this->plan;
    }

    public function drops()
    {
        return $this->belongsToMany(
            DropModel::class,
            'hosting_package_drops',
            'package_id',
            'drop_id'
        );
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}