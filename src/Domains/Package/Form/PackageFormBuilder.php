<?php namespace SuperV\Modules\Hosting\Domains\Package\Form;

use SuperV\Modules\Hosting\Domains\Package\Model\PackageModel;
use SuperV\Modules\Hosting\Domains\Services\Web\Model\WebServiceModel;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\UI\Form\FormBuilder;

class PackageFormBuilder extends FormBuilder
{
    protected $buttons = [
        'delete',
        'provision' => [
            'tooltip' => 'Provision Package on Server',
            'text'    => 'Provision',
            'type'    => 'info',
            'href'    => 'hosting/packages/{entry.id}/provision',
            'icon'    => 'fa fa-lock',
        ],
    ];

    public function onSaved(EntryModel $entry)
    {
        /** @var PackageModel $entry */
        $entry->parts()->delete();

        if (true || $this->isCreating()) {
            $plan = $entry->getPlan();

            if ($drops = $plan->getDrops()) {
                /** @var DropModel $drop */
                foreach ($drops as $drop) {

                    $replicate = $drop->replicate();
                    $replicate->fill([
                        'context' => 'package',
                        'name'    => str_replace('Plan Drop', 'Package Drop', $replicate->name),
                    ])->save();

                    $part = $entry->parts()->create([
                        'drop_id'      => $replicate->getId(),
                        'related_type' => WebServiceModel::class,
                    ]);

                    //$webServiceModel = WebServiceModel::create([
                    //    'part_id'  => $part->getId(),
                    //    'hostname' => $entry->getDomain(),
                    //]);
                    //
                    //$part->update(['related_id' => $webServiceModel->getId()]);

                    //$replicate = $drop->replicate();
                    //
                    //$replicate->fill([
                    //    'context' => 'package',
                    //    'name'    => str_replace('Plan Drop', 'Package Drop', $replicate->name),
                    //])->save();
                    //
                    //$entry->drops()->attach($replicate);

                    ///** @var AttributeInterface $attribute */
                    //foreach ($drop->getAttrs() as $attribute) {
                    //    $newAttribute = $attribute->replicate();
                    //    $newAttribute->setRelated($newDrop)->save();
                    //}
                }
            }
        }
    }
}