<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Platform\Domains\Entry\EntryModel;

class HostingEntryModel extends EntryModel
{
    protected $table = 'hosting_hostings';

    protected $fields = [
        'domain:text|unique',
    ];

}