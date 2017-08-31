<?php namespace SuperV\Modules\Hosting\Domains\Package\Model;

use SuperV\Modules\Hosting\Domains\Package\Package;
use SuperV\Platform\Domains\Model\EloquentRepository;

class Packages extends EloquentRepository
{
    public function build($package)
    {
        if (is_numeric($package)) {
            $package = $this->find($package);
        }

        if(! $package instanceof PackageModel || !$package->exists) {
            throw new \InvalidArgumentException('Package not found');
        }

        return new Package($package);
    }
}