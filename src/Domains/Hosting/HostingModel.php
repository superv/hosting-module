<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Platform\Domains\Model\EloquentModel;

class HostingModel extends EloquentModel
{
    protected $table = 'hosting_hostings';

//    protected $visible = ['domain', 'created_at'];

    public $timestamps = true;

}