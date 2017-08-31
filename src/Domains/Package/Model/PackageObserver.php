<?php

namespace SuperV\Modules\Hosting\Domains\Package\Model;

use SuperV\Modules\Supreme\Domains\Drop\Model\DropModel;
use SuperV\Platform\Domains\Entry\EntryModel;
use SuperV\Platform\Domains\Entry\EntryObserver;

class PackageObserver extends EntryObserver
{
    public function deleting(EntryModel $entry)
    {
        /** @var PackageModel $entry */
        $entry->getDrops()->map(function (DropModel $drop) use ($entry) {
            $entry->drops()->detach($drop);
            $drop->delete();
        });

        parent::deleting($entry);
    }
}