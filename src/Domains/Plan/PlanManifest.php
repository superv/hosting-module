<?php namespace SuperV\Modules\Hosting\Domains\Plan;

use SuperV\Platform\Domains\Manifest\ModelManifest;
use SuperV\Platform\Domains\UI\Form\FormBuilder;
use SuperV\Platform\Domains\UI\Page\Page;
use SuperV\Platform\Domains\UI\Table\TableBuilder;

class PlanManifest extends ModelManifest
{
    protected $routeKeyName = 'plan';

    public function handle()
    {
        $this->pages[] = (new Page('acp@hosting::plans.index'))
            ->setTitle('Plans')
            ->setUrl('hosting/plans');
    }

    public function getPages()
    {
        return [
            'index' => [
                'navigation' => true,
                'title'      => 'Plans',
                'route'      => 'acp@hosting::plans.index',
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
                'route'      => 'acp@hosting::plans.create',
                'url'        => 'hosting/plans/create',
                'handler'    => function (FormBuilder $builder, PlanModel $plan) {
                    return $builder->render($plan);
                },
                'buttons'    => [
                    'index',
                ],
            ],
            'edit'  => [
                'title'   => 'Edit Plan',
                'route'   => 'acp@hosting::plans.edit',
                'url'     => 'hosting/plans/{plan}/edit',
                'handler' => function (FormBuilder $builder, PlanModel $plan) {
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