<?php

namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Package\Model\PartModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class WebServiceEntryModel extends EntryModel
{
    public $timestamps = true;

    protected $table = 'hosting_services_web';

    protected $fields = [
        'part:relation' => [
            'related' => PartModel::class,
        ],

    ];

    protected $relationships = ['part'];
}