<?php

namespace SuperV\Modules\Hosting\Domains\Package;

use SuperV\Modules\Hosting\Domains\Package\Model\PartModel;

class Part
{
    /**
     * @var PartModel
     */
    private $model;

    /**
     * @var Package
     */
    private $package;

    public function __construct(Package $package, PartModel $model)
    {
        $this->model = $model;
        $this->package = $package;
    }

    public function createRelated()
    {
        $related = superv($this->model->getRelatedType())->package($this);

        $related->part()->save($this->model);
        //$this->model->related()->associate($related);
        //$this->model->update(['related_id' => $service->getId()]);
        //$this->model->related()->associate($service);

        return $related;
    }

    public function domain()
    {
        return $this->package->domain();
    }

    public function related()
    {
        return $this->model->getRelated();
    }

    public function id()
    {
        return $this->model->getKey();
    }
}