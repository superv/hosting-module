<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Modules\Hosting\Domains\Plan\Form\PlanFormBuilder;
use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Form\FormBuilder;
use SuperV\Platform\Domains\UI\Page\Page;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PlanManifest extends ModelManifest
{
    protected $routeKeyName = 'plan';

    public function handle()
    {
        $this->pages[] = (new Page('hosting::plans.index'))
            ->setTitle('Plans')
            ->setUrl('hosting/plans');
    }

    public function getPages()
    {
        return [
            'index' => [
                'navigation' => true,
                'icon' => 'files-o',
                'title'      => 'Plans',
                'route'      => 'hosting::plans.index',
                'url'        => 'hosting/plans',
                'handler'    => function (TableBuilder $builder) {

                    return $builder->setModel(PlanModel::class)
                                   ->setButtons(['edit', 'delete'])
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
                'handler'    => function (PlanFormBuilder $builder, PlanModel $plan) {
                    return $builder->render($plan);
                },
                'buttons'    => [
                    'index',
                ],
            ],
            'edit'  => [
                'title'   => 'Edit Plan',
                'route'   => 'hosting::plans.edit',
                'url'     => 'hosting/plans/{plan}/edit',
                'handler' => function (PlanFormBuilder $builder, PlanModel $plan) {
                    return $builder->render($plan);
                },
                'buttons' => [
                    'index',
                    'delete',
                    'create',
                ],
            ],

        ];
    }
}