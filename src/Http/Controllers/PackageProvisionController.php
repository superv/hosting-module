<?php namespace SuperV\Modules\Hosting\Http\Controllers;

use SuperV\Modules\Hosting\Domains\Package\Model\Packages;
use SuperV\Modules\Hosting\Domains\Package\Part;
use SuperV\Platform\Domains\Task\TaskBuilder;
use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class PackageProvisionController extends BaseAcpController
{
    public function index($packageId, Packages $packages)
    {
        $package = $packages->build($packageId);

        /** @var Part $part */
        foreach ($package->parts() as $part) {

            $service = $part->createRelated();

            dd($part->related());

        }

        dd($package->drops());
    }
}