<?php

namespace SuperV\Modules\Hosting\Domains\Package\Model;

use SuperV\Modules\Hosting\Model\Entry\PartEntryModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;

class PartModel extends PartEntryModel
{
    public function drop()
    {
        return $this->hasOne(DropModel::class, 'id', 'drop_id');
    }

    public function getDrop()
    {
        return $this->drop;
    }

    public function getDropId()
    {
        return $this->drop_id;
    }

    public function package()
    {
        return $this->belongsTo(PackageModel::class, 'package_id');
    }

    /** @return PackageModel */
    public function getPackage()
    {
        return $this->package;
    }

    public function related()
    {
        return $this->morphTo();
    }

    public function getRelated()
    {
        return $this->related;
    }

    public function getRelatedType()
    {
        return $this->related_type;
    }
}