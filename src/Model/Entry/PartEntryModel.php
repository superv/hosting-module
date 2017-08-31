<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PartEntryModel extends EntryModel
{

    protected $table = 'hosting_package_parts';

    protected $fields = [

        'package:relation' => [
            'related'  => PackageModel::class,
        ],
        'drop:relation' => [
            'related'  => DropModel::class,
        ],

    ];

    protected $relationships = ['plan', 'drop'];
}