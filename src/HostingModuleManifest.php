<?php namespace SuperV\Modules\Hosting;

use SuperV\Modules\Hosting\Domains\Hosting\HostingManifest;
use SuperV\Platform\Domains\Manifest\DropletManifest;

class HostingModuleManifest extends DropletManifest
{
    protected $title = 'Hosting Module';

      protected $link  = '/hosting';

      protected $navigation = true;

      protected $manifests = [
          HostingManifest::class
      ];
}