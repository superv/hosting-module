<?php namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Hosting\Model\Entry\PackageEntryModel;

class PackageModel extends PackageEntryModel
{
    public function plan()
    {
        return $this->hasOne(PlanModel::class, 'id', 'plan_id');
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