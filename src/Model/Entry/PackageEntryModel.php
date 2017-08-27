<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Supreme\Domains\Service\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PackageEntryModel extends EntryModel
{
    protected $table = 'hosting_packages';

    protected $fields = [
        'domain:text|unique',
        'username:text|unique',
        'password:text',

        'plan:relation' => [
            'related'  => PlanModel::class,
            'multiple' => false,
        ],

//        'drops:relation' => [
//            'related'  => DropModel::class,
//            'multiple' => true,
//            'mapped' => false
//        ],
    ];

    protected $relationships = ['plan'];

    public $timestamps = true;
}