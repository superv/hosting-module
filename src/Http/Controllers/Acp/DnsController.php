<?php namespace SuperV\Modules\Hosting\Http\Controllers\Acp;

use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class DnsController extends BaseAcpController
{
    public function index()
    {
        return $this->view->make('module::dns');
    }
}