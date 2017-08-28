<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PackageEntryModel extends EntryModel
{
    protected $table = 'hosting_packages';

    public $timestamps = true;

    protected $fields = [
        'domain:text|unique',
        'username:text|unique',
        'password:text',

        'plan:relation' => [
            'related'  => PlanModel::class,
            'multiple' => false,
        ],
    ];

    protected $relationships = ['plan'];
}