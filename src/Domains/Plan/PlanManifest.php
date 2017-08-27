<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Form\FormBuilder;
use SuperV\Platform\Domains\UI\Page\Page;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PlanManifest extends ModelManifest
{
    public function handle()
    {
        $this->pages[] = (new Page('acp@hosting::plans.index'))
            ->setTitle('Plans')
            ->setUrl('hosting/plans');
    }

    public function getPages()
    {
        return [
            'create' => [
                'navigation' => true,
                'title'      => 'Add New Plan',
                'route'      => 'acp@hosting::plans.create',
                'url'        => 'hosting/plans/create',
                'handler'    => function (FormBuilder $builder, PlanModel $plan) {
                    return $builder->render($plan);
                },
                'buttons'    => [
                    'index',
                ],
            ],
            'edit' => [
                        'title'      => 'Edit Plan',
                        'route'      => 'acp@hosting::plans.edit',
                        'url'        => 'hosting/plans/{plan}/edit',
                        'handler'    => function (FormBuilder $builder, PlanModel $plan) {
                            return $builder->render($plan);
                        },
                        'buttons'    => [
                            'index',
                            'create'
                        ],
                    ],
            'index'  => [
                'navigation' => true,
                'title'      => 'List Plans',
                'route'      => 'acp@hosting::plans.index',
                'url'        => 'hosting/plans',
                'handler'    => function (TableBuilder $builder) {
                    $builder->setModel(PlanModel::class)
                            ->setButtons(['edit']);

                    return $builder->render();
                },
                'buttons'    => [
                    'create',
                ],
            ],

        ];
    }
}