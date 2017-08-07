<?php namespace SuperV\Modules\Hosting;

use SuperV\Modules\Hosting\Features\CreateDnsRecord;
use SuperV\Modules\Hosting\Features\CreateDnsZone;
use SuperV\Modules\Hosting\Features\DeleteDnsRecord;
use SuperV\Modules\Hosting\Features\DeleteDnsZone;
use SuperV\Modules\Hosting\Http\Controllers\Acp\DnsController;
use SuperV\Modules\Hosting\Http\Controllers\Acp\HostingsController;
use SuperV\Platform\Domains\Droplet\DropletServiceProvider;

class HostingModuleServiceProvider extends DropletServiceProvider
{
    protected $routes = [
        'hostings'               => HostingsController::class . '@index',
        'hostings/{hosting}/edit' => [
            'as' => 'hostings::hosting.edit',
            'uses' => HostingsController::class . '@edit',
        ],
        'hostings/{hosting}/dns' => DnsController::class . '@index',
    ];

    protected $features = [
        CreateDnsZone::class,
        DeleteDnsZone::class,
        CreateDnsRecord::class,
        DeleteDnsRecord::class,
    ];
}