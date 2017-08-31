<?php namespace SuperV\Modules\Hosting\Domains\Package\Model;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Hosting\Model\Entry\PackageEntryModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;

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

    public function parts()
    {
        return $this->hasMany(PartModel::class, 'package_id');
    }

    public function getParts()
    {
        return $this->parts;
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