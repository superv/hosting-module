<?php

namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class WebServiceEntryModel extends EntryModel
{
    public $timestamps = true;

    protected $table = 'hosting_services_web';

    protected $fields = [

        'package:relation' => [
            'related'  => PackageModel::class,
        ],

    ];

    protected $relationships = ['package', 'drop'];
}