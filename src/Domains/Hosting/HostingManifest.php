<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Form\FormBuilder;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class HostingManifest extends ModelManifest
{
    protected $model = HostingModel::class;

    public function getPages()
    {
        return [
            'create' => [
                'navigation' => true,
                'title'      => 'Add New Hosting',
                'route'      => 'acp@hosting::hostings.create',
                'url'        => 'hosting/hostings/create',
                'handler'    => function (FormBuilder $builder, HostingModel $service) {
                    return $builder->render($service);
                },
                'buttons'    => [
                    'index',
                ],
            ],
            'index'  => [
                'navigation' => true,
                'title'      => 'List Hostings',
                'route'      => 'acp@hosting::hostings.index',
                'url'        => 'hosting/hostings',
                'handler'    => function (TableBuilder $builder) {
                    $builder->setModel(HostingModel::class)
                            ->setButtons(['edit']);

                    return $builder->render();
                },
                'buttons'    => [
                    'create',
                ],
            ],

            'edit' => [
                'title'   => 'Edit Hosting',
                'route'   => 'acp@hosting::hostings.edit',
                'url'     => 'hosting/hostings/{id}/edit',
                'handler' => function (FormBuilder $builder, Hostings $hostings, $id) {
                    return $builder->render($hostings->find($id));
                },
                'buttons' => [
                    'create',
                    'delete'      => ['class' => 'remote', 'href' => '/Delete'],
                    'install_dns' => [
                        'text'  => 'Install Server',
                        'href'  => 'hosting/hostings/{entry.id}/install',
                        'class' => 'remote',
                    ],
                ],
                'tabs'    => [
                    'ajax'    => true,
                    'details' => [
                        'label'   => 'Hosting Details',
                        'handler' => function (FormBuilder $builder, Hostings $hostings, $id) {
                            return $builder->render($hostings->find($id));
                        },
                    ],
                ],
            ],
        ];
    }
}