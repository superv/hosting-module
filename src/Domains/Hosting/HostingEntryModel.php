<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Modules\Hosting\Domains\Services\HostingServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class HostingEntryModel extends EntryModel
{
    protected $table = 'hosting_hostings';

    protected $fields = [
        'domain:text|unique',

        'services:relation' => [
            'related'  => HostingServiceModel::class,
            'multiple' => true,
        ],
    ];

    protected $relationships = ['services'];
}