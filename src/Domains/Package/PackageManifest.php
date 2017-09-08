<?php namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Package\Form\PackageFormBuilder;
use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Modules\Hosting\Domains\Plan\Plans;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PackageManifest
{
    public function handle()
    {
        return [
            'port' => 'acp',
            'pages' => [
                'choose_plan' => [
                    'title'   => 'Choose Plan',
                    'route'   => 'hosting::plans.choose',
                    'url'     => 'hosting/plans/choose',
                    'handler' => function (Plans $plans) {
                        return view()->make('module::plans/choose', ['plans' => $plans->all(),
                                                                     'route' => 'hosting::packages.create']);
                    },
                ],
                'index'       => [
                    'navigation' => true,
                    'icon'       => 'puzzle-piece',
                    'title'      => 'Packages',
                    'route'      => 'hosting::packages.index',
                    'url'        => 'hosting/packages',
                    'handler'    => function (TableBuilder $builder) {
                        $builder->setModel(PackageModel::class)
                                ->setButtons(['delete', 'edit']);

                        return $builder->render();
                    },
                    'buttons'    => [
                        'create',
                        'choose_plan' => [
                            'text'        => 'Choose Plan',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                        ],
                    ],
                ],

                'create' => [
                    'navigation' => true,
                    'title'      => 'New Package',
                    'route'      => 'hosting::packages.create',
                    'url'        => 'hosting/packages/create',
                    'handler'    => function (PackageFormBuilder $builder, PackageModel $entry) {
                        return $builder->render($entry);
                    },
                    'buttons'    => [
                        'index',
                    ],
                ],

                'edit' => [
                    'title'   => 'Edit Package',
                    'route'   => 'hosting::packages.edit',
                    'url'     => 'hosting/packages/{package}/edit',
                    'handler' => function (PackageFormBuilder $builder, PackageModel $entry) {
                        return $builder->render($entry);
                    },
                    'buttons' => [
                        'create',
                        'index',
                    ],
                ],
            ],
        ];
    }
}