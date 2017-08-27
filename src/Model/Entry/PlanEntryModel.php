<?php namespace SuperV\Modules\Hosting\Model\Entry;

use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;

class PlanEntryModel extends EntryModel
{
    protected $table = 'hosting_plans';

    protected $fields = [
        'slug:text|required|unique',
        'name:text|required',
        'services:relation' => [
            'related' => ServiceModel::class,
            'multiple' => true,
            'expanded' => true
        ]
    ];

    protected $relationships = ['services'];

    public function services()
    {
        return $this->belongsToMany(
            ServiceModel::class,
            'hosting_plan_services',
            'plan_id',
            'service_id'
        );
    }
}