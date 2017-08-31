<?php namespace SuperV\Modules\Hosting\Http\Controllers;

use SuperV\Modules\Hosting\Domains\Package\Model\Packages;
use SuperV\Modules\Supreme\Domains\Drop\Drop;
use SuperV\Platform\Domains\Task\Jobs\DeployTaskJob;
use SuperV\Platform\Domains\Task\TaskBuilder;
use SuperV\Ports\Acp\Http\Controllers\BaseAcpController;

class PackageProvisionController extends BaseAcpController
{
    public function index($packageId, Packages $packages, TaskBuilder $builder)
    {
        $package = $packages->build($packageId);

        /** @var Drop $drop */
        foreach ($package->drops() as $drop) {
            $agent = $drop->agent();

            dd($agent, $agent->getFeature('provision'));

            $task = $builder->setTitle('Provision Package Drop #'.$drop->getId())->setPayload([
                'feature' => $agent->getFeature('provision'),
            ])->build();

            $this->dispatch(new DeployTaskJob($task));
        }

        dd($package->drops());
    }
}