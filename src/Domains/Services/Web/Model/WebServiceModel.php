<?php

namespace SuperV\Modules\Hosting\Domains\Services\Web\Model;

use SuperV\Modules\Hosting\Domains\Package\Model\PartModel;
use SuperV\Modules\Hosting\Domains\Package\Package;
use SuperV\Modules\Hosting\Domains\Package\Part;
use SuperV\Modules\Hosting\Model\Entry\WebServiceEntryModel;

class WebServiceModel extends WebServiceEntryModel
{
    public function part()
    {
        return $this->morphOne(PartModel::class, 'related', null, 'id', 'part_id');
    }
    public function getPart()
    {
        return $this->part;
    }

    public function package(Part $part)
    {
        return $this->create([
            'hostname' => $part->domain(),
            'part_id' => $part->id(),
        ]);
    }
}