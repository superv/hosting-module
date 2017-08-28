<?php namespace SuperV\Modules\Hosting;

use Illuminate\Database\Eloquent\Relations\Relation;
use SuperV\Modules\Hosting\Features\CreateDnsRecord;
use SuperV\Modules\Hosting\Features\CreateDnsZone;
use SuperV\Modules\Hosting\Features\DeleteDnsRecord;
use SuperV\Modules\Hosting\Features\DeleteDnsZone;
use SuperV\Platform\Domains\Droplet\DropletProvider;
use SuperV\Platform\Domains\Droplet\DropletServiceProvider;

class HostingModuleServiceProvider extends DropletServiceProvider
{
    protected $features = [
        CreateDnsZone::class,
        DeleteDnsZone::class,
        CreateDnsRecord::class,
        DeleteDnsRecord::class,
    ];

    public function register() {
        Relation::morphMap([
            'dns_zone' => 'SuperV\Modules\Hosting\Domains\Services\Dns\ZoneModel',
        ]);
    }
}