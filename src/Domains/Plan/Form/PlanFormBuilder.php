<?php

namespace SuperV\Modules\Hosting\Domains\Plan\Form;

use SuperV\Modules\Hosting\Domains\Plan\PlanModel;
use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Modules\Supreme\Domains\Service\Model\Services;
use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\UI\Form\FormBuilder;

class PlanFormBuilder extends FormBuilder
{
    public function onSaved(EntryModel $entry, Services $services)
    {
        /** @var PlanModel $entry */
        $entry->drops()->delete();

        if ($this->isCreating() || true) {

            if ($selectedServices = $this->getPostData('services')) {
                /** @var ServiceModel $service */
                foreach ($services->in($selectedServices) as $service) {
                    $entry->drops()->create([
                        'server_id'    => $service->getServerId(),
                        'agent_id'     => $service->getAgent()->getId(),
                        'name'         => "{$service->getName()} Plan Drop",
                        'service_type' => $service->getType(),
                        'context'      => 'plan',
                        'status'       => 0,
                    ]);

                    //$this->dispatch(new AssignDropper($plan, $service->getDropper(), 'package'));
                }
            }
        }
    }

    public function handle(DropRepositoryInterface $drops, AttributeRepositoryInterface $attributes)
       {
           $dropAttributes = [
               'dropper_id' => $this->dropper->getId(),
               'context'    => $this->context,
           ];

           if ($this->context == 'server') {
               array_set($dropAttributes, 'server_id', $this->entry->getId());
           }

           $drop = $drops->create($dropAttributes);

           $this->entry->drops()->attach($drop);

           /** @var AttributeTypeModel $attributeType */
           foreach ($this->dropper->getAttributeTypes($this->context) as $attributeType) {
               $attributes->create([
                   'related_type'      => get_class($drop),
                   'related_id'        => $drop->getId(),
                   'attribute_type_id' => $attributeType->getId(),
                   'value'             => $attributeType->getDefaultValue(),
               ]);
           }
       }
}