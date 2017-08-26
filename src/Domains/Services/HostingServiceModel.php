<?php namespace SuperV\Modules\Hosting\Domains\Services;

use SuperV\Modules\Hosting\Domains\Hosting\HostingModel;
use SuperV\Modules\Hosting\Model\Entry\HostingServiceEntryModel;

class HostingServiceModel extends HostingServiceEntryModel
{
    public function hosting()
    {
        return $this->belongsTo(HostingModel::class, 'id', 'hosting_id');
    }
}