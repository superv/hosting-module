<?php

use SuperV\Modules\Hosting\Http\Controllers\Acp\DnsController;
use SuperV\Modules\Hosting\Http\Controllers\Acp\HostingsController;
use SuperV\Modules\Hosting\Http\Controllers\ProvisionPackageController;

return [
    'hostings'                => HostingsController::class.'@index',
    'hostings/{hosting}/edit' => [
        'as'   => 'hostings::hosting.edit',
        'uses' => HostingsController::class.'@edit',
    ],
    'hostings/{hosting}/dns'  => DnsController::class.'@index',

    'hosting/packages/{package}/provision' => ProvisionPackageController::class.'@index',
];