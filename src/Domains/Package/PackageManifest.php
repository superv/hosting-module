<?php namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Plan\Plans;
use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Form\FormBuilder;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PackageManifest extends ModelManifest
{
    public function getPages()
    {
        return [
            'choose_plan' => [
                'route'   => 'acp@hosting::plans.choose',
                'url'     => 'hosting/plans/choose',
                'handler' => function (Plans $plans) {
                    return view()->make('module::plans/choose', ['plans' => $plans->all(), 'route' => 'acp@hosting::packages.create' ]);
                },
            ],
            'create'      => [
                'navigation' => true,
                'title'      => 'New Package',
                'route'      => 'acp@hosting::packages.create',
                'url'        => 'hosting/packages/create',
                'handler'    => function (FormBuilder $builder, PackageModel $service) {
                    return $builder->render($service);
                },
                'buttons'    => [
                    'index',
                ],
            ],
            'index'       => [
                'navigation' => true,
                'title'      => 'Packages',
                'route'      => 'acp@hosting::packages.index',
                'url'        => 'hosting/packages',
                'handler'    => function (TableBuilder $builder) {
                    $builder->setModel(PackageModel::class)
                            ->setButtons(['edit']);

                    return $builder->render();
                },
                'buttons'    => [
                    'create',
                    'choose_plan' => [
                        'data-toggle' => 'modal',
                        'data-target' => '#modal'
                    ],
                ],
            ],

            'edit' => [
                'title'   => 'Edit Package',
                'route'   => 'acp@hosting::packages.edit',
                'url'     => 'hosting/packages/{id}/edit',
                'handler' => function (FormBuilder $builder, Packages $packages, $id) {
                    return $builder->render($packages->find($id));
                },
                'buttons' => [
                    'create',
                    'delete' => ['class' => 'remote'],
                ],
            ],
        ];
    }
}