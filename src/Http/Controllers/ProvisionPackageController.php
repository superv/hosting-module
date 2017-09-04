<?php namespace SuperV\Modules\Hosting\Http\Controllers;

use SuperV\Modules\Hosting\Domains\Package\Model\Packages;
use SuperV\Modules\Hosting\Domains\Package\Part;
use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class ProvisionPackageController extends BaseAcpController
{
    public function index($packageId, Packages $packages)
    {
        $package = $packages->build($packageId);

        /** @var Part $part */
        foreach ($package->parts() as $part) {

            $service = $part->createRelated();

        }

        return 'queued';
    }
}