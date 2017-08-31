<?php

namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Modules\Hosting\Domains\Package\Model\PartModel;
use SuperV\Modules\Supreme\Domains\Drop\Drop;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;

class Package
{
    /**
     * @var PackageModel
     */
    private $model;

    public function __construct(PackageModel $model)
    {
        $this->model = $model;
    }

    public function domain()
    {
       return  $this->model->getDomain();
    }

    public function parts()
    {
        $models = $this->model->getParts();

        return $models->map(function(PartModel $model) {
            return new Part($this, $model);
        });

    }

    public function drops()
    {
        $dropModels = $this->model->getDrops();

        $drops = $dropModels->map(function(DropModel $model) {
            return new Drop($model);
        });

        return $drops;
    }
}