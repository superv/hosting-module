<?php namespace SuperV\Modules\Hosting\Http\Controllers;

use SuperV\Modules\Hosting\Domains\Package\PackageModel;
use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class PackageProvisionController extends BaseAcpController
{
    public function index(PackageModel $package)
    {
        dd($package->getDrops());
    }
}