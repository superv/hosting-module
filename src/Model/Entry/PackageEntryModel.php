<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PackageEntryModel extends EntryModel
{
    public $timestamps = true;

    protected $table = 'hosting_packages';

    protected $fields = [
        'domain:text|unique|required',
        'username:text|unique|required',
        'password:text|required',

        'plan:relation' => [
            'related'  => PlanModel::class,
            'multiple' => false,
        ],

        'drops:relation' => [
            'related'  => DropModel::class,
            'multiple' => true,
            'expanded' => true,
        ],
    ];

    protected $relationships = ['plan', 'drops'];
}