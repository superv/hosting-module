<?php namespace SuperV\Modules\Hosting\Domains\Hosting\Features;

use SuperV\Modules\Hosting\Domains\Hosting\HostingModel;
use SuperV\Platform\Domains\Feature\Feature;
use SuperV\Platform\Domains\UI\Button\Features\MakeButton;
use SuperV\Platform\Domains\UI\Table\Table;

class ListHostings extends Feature
{
//    public static $route = 'get@acp/hostings';

    public function handle(Table $table)
    {
        $rows = HostingModel::get();

        $table = $table->create($rows);

        $table->addColumn('action_view', '', function ($model) {
            return '<a href="/hostings/' . $model->id . '/dns" class="btn btn-success">DNS</a>';
        });

        $table->addButton([
            'button' => 'view',
            'href'   => '/hostings/{entry.id}',
        ]);
        $buttonsRaw = [
            [
                'button' => 'new_hosting',
                'text'   => 'Add New Hosting',
                'type' => 'success',
                'icon'   => 'fa-plus',
                'href'   => '/hostings/create/{entry.id}',
            ],
            [
                'button' => 'new_hosting',
                'text'   => 'Add New DNS',
                'type' => 'warning',
                'icon'   => 'fa-plus',
                'href'   => '/hostings/create}',
            ],
        ];
        $buttons = [];
        $arguments = [
            'entry' => [
                'id' => 7,
                'name' => 'Entiri'
            ]
        ];
        foreach ($buttonsRaw as $button) {
            $buttons[] = $this->dispatch(new MakeButton($button, $arguments));
        }


        $table->setButtons($buttons);

        return view('tables.basic', compact('table'));
    }
}