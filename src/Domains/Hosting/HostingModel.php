<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Platform\Domains\Entry\EntryModel;

class HostingModel extends EntryModel
{
    protected $table = 'hosting_hostings';

//    protected $visible = ['domain', 'created_at'];

    public $timestamps = true;

}