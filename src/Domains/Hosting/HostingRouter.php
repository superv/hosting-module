<?php namespace SuperV\Modules\Hosting\Domains\Hosting;

use SuperV\Platform\Domains\Entry\EntryRouter;

class HostingRouter extends EntryRouter
{
    public function edit()
    {
        return $this->url->route('hostings::hosting.edit', ['hosting' => $this->entry->getId()]);
    }
}