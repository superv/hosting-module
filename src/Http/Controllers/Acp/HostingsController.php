<?php namespace SuperV\Modules\Hosting\Http\Controllers\Acp;

use SuperV\Modules\Hosting\Domains\Hosting\Features\ListHostings;
use SuperV\Modules\Hosting\Domains\Hosting\Table\HostingTableBuilder;
use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class HostingsController extends BaseAcpController
{
    public function index(HostingTableBuilder $builder)
    {
        return $builder->render();
    }
}