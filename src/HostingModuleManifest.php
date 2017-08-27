<?php namespace SuperV\Modules\Hosting;

use SuperV\Modules\Hosting\Domains\Package\PackageManifest;
use SuperV\Modules\Hosting\Domains\Plan\PlanManifest;
use SuperV\Platform\Domains\Manifest\DropletManifest;

class HostingModuleManifest extends DropletManifest
{
    protected $title = 'Hosting Module';

      protected $link  = '/hosting';

      protected $navigation = true;

      protected $manifests = [
          PackageManifest::class,
          PlanManifest::class,
      ];
}