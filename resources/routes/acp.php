<?php

use SuperV\Modules\Hosting\Http\Controllers\Acp\DnsController;
use SuperV\Modules\Hosting\Http\Controllers\Acp\HostingsController;

return [
    'hostings'                => HostingsController::class . '@index',
    'hostings/{hosting}/edit' => [
        'as'   => 'hostings::hosting.edit',
        'uses' => HostingsController::class . '@edit',
    ],
    'hostings/{hosting}/dns'  => DnsController::class . '@index',
];