<?php namespace SuperV\Modules\Hosting\Domains\Package\Form;

use SuperV\Modules\Hosting\Domains\Package\PackageModel;
use SuperV\Modules\Supreme\Domains\Service\Model\ServiceModel;
use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\UI\Form\FormBuilder;

class PackageFormBuilder extends FormBuilder
{
    protected $buttons = [
        'delete',
        'provision' => [
            'tooltip' => 'Provision Package on Server',
            'text' => 'Provision',
            'type' => 'info',
            'href' => 'hosting/packages/{entry.id}/provision',
            'icon' => 'fa fa-lock'
        ]
    ];
    public function onSaved(EntryModel $entry)
    {
        /** @var PackageModel $entry */
        $mode = $this->getForm()->getMode();

        $entry->drops()->delete();

        if (true || $mode == 'create') {
            $plan = $entry->getPlan();

            if ($services = $plan->getServices()) {
                /** @var ServiceModel $service */
                foreach ($services as $service) {
                    $entry->drops()->create(
                        [
                            'server_id'    => $service->getServerId(),
                            'agent_id'     => $service->getAgent()->getId(),
                            'name'         => "{$service->getName()} Drop",
                            'service_type' => $service->getType(),
                            'context'      => 'package',
                            'status'       => 0,
                        ]
                    );
                }
            }
        }
    }
}