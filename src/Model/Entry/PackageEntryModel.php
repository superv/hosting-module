<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PackageEntryModel extends EntryModel
{
    public static $routeKeyname = 'package';

    public $timestamps = true;

    protected $table = 'hosting_packages';

    protected $fields = [
        'domain:text|unique|required',
        'username:text|unique|required',
        'password:text|required',

        'plan:relation' => [
            'related' => PlanModel::class,
        ],

        //'parts:relation' => [
        //    'related'  => PartModel::class,
        //    'multiple' => true,
        //    'expanded' => true,
        //],
    ];

    protected $relationships = ['plan'];
}