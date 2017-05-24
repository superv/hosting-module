<?php namespace SuperV\Modules\Hosting;

use SuperV\Platform\Domains\Droplet\DropletServiceProvider;

class HostingModuleServiceProvider extends DropletServiceProvider
{
    protected $routes = [];

    protected $features = [];
}