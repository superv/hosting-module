<?php namespace SuperV\Modules\Hosting;

use SuperV\Modules\Hosting\Domains\Package\PackageManifest;
use SuperV\Modules\Hosting\Domains\Plan\PlanManifest;
use SuperV\Platform\Domains\Droplet\Droplet;

class HostingModule extends Droplet
{
    protected $title = 'Hosting Module';

    protected $link = '/hosting';

    protected $navigation = true;

    protected $icon = 'globe';

    protected $manifests = [
        PackageManifest::class,

        PlanManifest::class,
    ];
}