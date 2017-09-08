<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Modules\Hosting\Domains\Plan\Form\PlanFormBuilder;
use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PlanManifest
{
    public function handle()
    {
        return [
            'port' => 'acp',
            'pages' => [
                'index'  => [
                    'navigation' => true,
                    'icon'       => 'files-o',
                    'title'      => 'Plans',
                    'route'      => 'hosting::plans.index',
                    'url'        => 'hosting/plans',
                    'handler'    => function (TableBuilder $builder) {

                        return $builder->setModel(PlanModel::class)
                                       ->setButtons(['delete', 'edit'])
                                       ->render();
                    },
                    'buttons'    => [
                        'create',
                    ],
                ],
                'create' => [
                    'navigation' => true,
                    'title'      => 'New Plan',
                    'route'      => 'hosting::plans.create',
                    'url'        => 'hosting/plans/create',
                    'handler'    => function (PlanFormBuilder $builder, PlanModel $entry) {
                        return $builder->render($entry);
                    },
                    'buttons'    => [
                        'index',
                    ],
                ],
                'edit'   => [
                    'title'   => 'Edit Plan',
                    'route'   => 'hosting::plans.edit',
                    'url'     => 'hosting/plans/{plan}/edit',
                    'handler' => function (PlanFormBuilder $builder, PlanModel $entry) {
                        return $builder->render($entry);
                    },
                    'buttons' => [
                        'index',
                        'delete',
                        'create',
                    ],
                ],

            ],
        ];
    }
}