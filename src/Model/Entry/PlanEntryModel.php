<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PlanEntryModel extends EntryModel
{
    public static $routeKeyname = 'plan';

    protected $table = 'hosting_plans';

    protected $fields = [
        'slug:text|required|unique',
        'name:text|required',
        'services:relation' => [
            'related'  => ServiceModel::class,
            'mapped'   => false,
            'multiple' => true,
            'expanded' => true,
        ],
    ];
    //protected $relationships = ['services'];

}