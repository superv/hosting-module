<?php

namespace SuperV\Modules\Hosting\Domains\Package\Model;

use PhpParser\Builder\Function_;
use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\Entry\EntryObserver;

class PackageObserver extends EntryObserver
{
    public function deleted(EntryModel $entry)
    {
        /** @var PackageModel $entry */
        $entry->getParts()->map(function (PartModel $part) {
            $part->delete();
        });
        //$entry->getDrops()->map(function (DropModel $drop) use ($entry) {
        //    $entry->drops()->detach($drop);
        //    $drop->delete();
        //});

        parent::deleted($entry);
    }
}